@extends('layouts.frontend')

@section('content')
    <div class="container house">
        <div class="house-titles has-text-centered">
            <h1 class="title">{{ $property->title }}</h1>
            <h2 class="subtitle">{{ $property->address }}</h1>
        </div>

        <div class="columns">
            <div class="column is-two-thirds">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-16by9">
                            @foreach($property->getMedia('images') as $image)
                                <img v-img:gallery src="{{ url($image->getUrl('slideshow')) }}" alt="Photo {{ $loop->iteration }}" class="@if($loop->iteration != 1) hidden @endif">
                            @endforeach
                        </figure>
                        <div class="selection-buttons has-text-centered">
                            <div class="image-button circle">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                            </div>
                            <div class="image-button circle">
                                <i class="fa fa-map-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="price">
                            <span class="card-price">
                                ${{ number_format($property->price, 2) }}
                            </span>
                            <span class="is-pulled-right is-uppercase house-status">{{ $property->status->name }}</span>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Property Type</span>
                                <span class="item-data">{{ $property->type }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">Year</span>
                                <span class="item-data">{{ $property->year }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Home Size</span>
                                <span class="item-data">{{ $property->home_size }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">Lot Size</span>
                                <span class="item-data">{{ $property->lot_size }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Bedrooms</span>
                                <span class="item-data">{{ $property->bedrooms }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">Bathrooms</span>
                                <span class="item-data">{{ $property->bathrooms }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Garages</span>
                                <span class="item-data">{{ $property->garages }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">HOA Fees</span>
                                <span class="item-data">${{ $property->hoa_fees }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card contact-us-card is-uppercase">
                    <div class="card-content">
                        <p class="title has-text-centered">
                            <span class="contact-us-bold">Contact</span> <span class="contact-us-light">us</span>
                        </p>
                        <p class="subtitle has-text-centered">
                            About this property
                        </p>
                        <form>
                            <b-field label="Name">
                                <b-input></b-input>
                            </b-field>
                            <b-field label="Email">
                                <b-input type="email"></b-input>
                            </b-field>
                            <b-field label="Contact Number">
                                <b-input></b-input>
                            </b-field>
                            <b-field label="Message">
                                <b-input maxlength="200" type="textarea"></b-input>
                            </b-field>
                        </form>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">
                            <span>
                                Send message
                            </span>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection
