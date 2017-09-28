@extends('layouts.frontend')

@section('content')
    <p class="title has-text-centered is-uppercase">
        <span class="new-bold">New</span> <span class="new-light">Property</span>
    </p>

    <div class="container">
        <form method="POST" action="/properties" enctype="multipart/form-data">

            {{ csrf_field() }}

            <b-field label="Title">
                <b-input type="text" name="title" id="title" required></b-input>
            </b-field>
            <b-field label="Property type">
                <b-select name="type" id="type" placeholder="Select property type" required>
                    <option value="1">Single Family Home</option>
                    <option value="2">Apartment</option>
                    <option value="3">Condo</option>
                    <option value="4">Townhouse</option>
                </b-select>
            </b-field>
            <b-field label="Address">
                <b-input type="text" name="address" id="address" onFocus="geolocate()" required></b-input>
            </b-field>
            <b-field label="Property status">
                <b-select name="status" id="status" placeholder="Select property status" required>
                    <option value="1">Available</option>
                    <option value="2">Coming Soon</option>
                    <option value="3">Pending</option>
                    <option value="4">Under Contract</option>
                    <option value="5">Sold</option>
                </b-select>
            </b-field>
            <b-field label="Price">
                <b-input placeholder="Price"
                    type="number"
                    name="price"
                    id="price"
                    min="0"
                    pattern="[0-9]*"
                    inputmode="numeric"
                    required>
                </b-input>
            </b-field>
            <b-field label="Description">
                <b-input name="description" id="editor" type="textarea" required></b-input>
            </b-field>
            <div class="form-group">
                <label for="home_size">Home Size</label>
                <input type="number" step="0.01" min="0" name="home_size" id="home_size">
            </div>
            <div class="form-group">
                <label for="lot_size">Lot Size</label>
                <input type="number" step="0.01" min="0" name="lot_size" id="lot_size">
            </div>
            <div class="form-group">
                <label for="bedrooms">Bedrooms</label>
                <input type="number" step="1" min="1" name="bedrooms" id="bedrooms">
            </div>
            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" step="1" min="1" name="bathrooms" id="bathrooms">
            </div>
            <div class="form-group">
                <label for="garages">Garages</label>
                <input type="number" step="1" min="0" name="garages" id="garages">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" id="year">
            </div>
            <div class="form-group">
                <label for="hoa_fees">HOA Fees</label>
                <input type="number" step="0.01" min="0" name="hoa_fees" id="hoa_fees">
            </div>
            <div class="dropzone" id="dropzone"></div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        @include('partials.formerrors')

    </div>
@endsection
