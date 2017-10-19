@extends('layouts.frontend')

@section('pageTitle', 'Edit - ' . $property->title)

@section('content')
    <p class="title has-text-centered is-uppercase">
        <span class="new-bold">Edit</span> <span class="new-light">Property</span>
    </p>

    <div class="container">
        <form method="POST" action="/admin/property/{{ $property->id }}/edit" enctype="multipart/form-data" id="new-property">

            {{ csrf_field() }}

            <b-field label="Title">
                <b-input type="text" name="title" id="title" required
                    value="{{ $property->title }}"></b-input>
            </b-field>
            <b-field label="Property type">
                <b-select name="type" id="type" placeholder="Select property type" required
                value="{{ $property->type }}">
                    <option
                        v-for="type in {!! htmlspecialchars($types->toJson(), ENT_QUOTES, 'UTF-8') !!}"
                        :value="type.id"
                        :key="type.id">
                        @{{ type.name }}
                    </option>
                </b-select>
            </b-field>
            <b-field label="Address">
                <b-input type="text" name="address" id="address" onFocus="geolocate()" required
                    value="{{ $property->address }}"></b-input>
            </b-field>
            <b-field label="Property status">
                <b-select name="status_id" id="status_id" placeholder="Select property status" required
                value="{{ $property->status_id }}">
                    <option
                        v-for="status in {!! htmlspecialchars($statuses->toJson(), ENT_QUOTES, 'UTF-8') !!}"
                        :value="status.id"
                        :key="status.id">
                        @{{ status.name }}
                    </option>
                </b-select>
            </b-field>
            <b-field label="Price">
                <b-input
                    type="number"
                    name="price"
                    id="price"
                    min="0"
                    step="0.01"
                    inputmode="numeric"
                    required
                    value="{{ $property->price }}">
                </b-input>
            </b-field>
            <b-field label="Description">
                <b-input name="description" id="editor" type="textarea"
                    value="{{ $property->description }}"></b-input>
            </b-field>
            <b-field label="Home size">
                <b-input placeholder="in sq ft"
                    type="number"
                    name="home_size"
                    id="home_size"
                    min="0"
                    step="0.01"
                    inputmode="numeric"
                    required
                    value="{{ $property->home_size }}">
                </b-input>
            </b-field>
            <b-field label="Lot size">
                <b-input placeholder="in acres"
                    type="number"
                    name="lot_size"
                    id="lot_size"
                    min="0"
                    step="0.01"
                    inputmode="numeric"
                    required
                    value="{{ $property->lot_size }}">
                </b-input>
            </b-field>
            <b-field label="Bedrooms">
                <b-input
                    type="number"
                    name="bedrooms"
                    id="bedrooms"
                    min="0"
                    inputmode="numeric"
                    required
                    value="{{ $property->bedrooms }}">
                </b-input>
            </b-field>
            <b-field label="Bathrooms">
                <b-input
                    type="number"
                    name="bathrooms"
                    id="bathrooms"
                    min="0"
                    inputmode="numeric"
                    required
                    value="{{ $property->bathrooms }}">
                </b-input>
            </b-field>
            <b-field label="Garages">
                <b-input
                    type="number"
                    name="garages"
                    id="garages"
                    min="0"
                    inputmode="numeric"
                    required
                    value="{{ $property->garages }}">
                </b-input>
            </b-field>
            <b-field label="Year">
                <b-input
                    type="number"
                    name="year"
                    id="year"
                    min="1801"
                    max="2099"
                    inputmode="numeric"
                    pattern="[0-9]{4}"
                    required
                    value="{{ $property->year }}">
                </b-input>
            </b-field>
            <b-field label="HOA Fees">
                <b-input
                    type="number"
                    name="hoa_fees"
                    id="hoa_fees"
                    min="0"
                    step="0.01"
                    inputmode="numeric"
                    required
                    value="{{ $property->hoa_fees }}">
                </b-input>
            </b-field>
            <b-field label="Uploaded Pictures"
            type="is-danger"
            message="WARNING &mdash; Removing a picture is immediate and permanent">
                <div class="control is-clearfix">
                    @foreach($property->getMedia('images') as $image)
                        <figure class="uploaded-image image is-128x128">
                            <img src="{{ url($image->getUrl('thumb')) }}" alt="Photo {{ $loop->iteration }}">
                            <button type="button" class="delete"
                                v-on:click="deletePicture($event, {{ $image->id }}, {{ $property->id }})"></button>
                        </figure>
                    @endforeach
                </div>
            </b-field>
            <section>
                <b-field>
                    <b-upload v-model="dropFiles"
                        name="files[]"
                        multiple
                        drag-drop>
                        <section class="section">
                            <div class="content has-text-centered">
                                <p>
                                    <b-icon
                                        icon="upload"
                                        size="is-large">
                                    </b-icon>
                                </p>
                                <p>Drop your files here or click to upload</p>
                            </div>
                        </section>
                    </b-upload>
                </b-field>

                <div class="tags">
                    <span v-for="(file, index) in dropFiles"
                        :key="index"
                        class="tag is-primary" >
                        @{{ file.name }}
                        <button class="delete is-small"
                            type="button"
                            @click="deleteDropFile(index)">
                        </button>
                    </span>
                </div>
            </section>
            <b-field>
                <p class="control">
                    <button id="submit" class="button is-primary property-button" type="submit">
                        Submit
                    </button>
                </p>
            </b-field>
        </form>

        @include('partials.formerrors')

    </div>
@endsection
