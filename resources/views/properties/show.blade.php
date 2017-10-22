@extends('layouts.frontend')

@section('pageTitle', $property->title . '- West Point Real Estate')

@section('content')
    <div class="container house">
        <div class="house-titles has-text-centered">
            <h1 class="title">{{ $property->title }}</h1>
            <h2 class="subtitle">{{ $property->address }}</h2>
        </div>

        <div class="columns">
            <div class="column is-two-thirds">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-16by9">
                            @foreach($property->getMedia('images') as $image)
                                <img v-img:gallery src="{{ url($image->getUrl('slideshow')) }}" alt="Photo {{ $loop->iteration }}" class="@if($loop->iteration != 1) hidden @endif">
                            @endforeach
                            <div id="map" class="hidden"></div>
                        </figure>
                        <div class="selection-buttons has-text-centered">
                            <div id="picture-btn" class="image-button circle" onclick="hideMap()">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                            </div>
                            <div id="map-btn" class="image-button circle not-active" onclick="showMap()">
                                <i class="fa fa-map-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <header class="card-header">
                        <div class="price">
                            <span class="card-price">
                                ${{ number_format($property->price, 2) }}
                            </span>
                            <span class="is-pulled-right is-uppercase house-status">{{ $property->status->name }}</span>
                        </div>
                    </header>
                    <div class="card-content">
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Property Type</span>
                            </div>
                            <div class="column">
                                <span class="item-data">{{ $property->type->name }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">Year</span>
                            </div>
                            <div class="column">
                                <span class="item-data">{{ date('Y', strtotime($property->year)) }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Home Size</span>
                            </div>
                            <div class="column">
                                <span class="item-data">{{ number_format($property->home_size, 2, '.', ',') }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">Lot Size</span>
                            </div>
                            <div class="column">
                                <span class="item-data">{{ number_format($property->lot_size, 2, '.', ',') }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Bedrooms</span>
                            </div>
                            <div class="column">
                                <span class="item-data">{{ $property->bedrooms }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">Bathrooms</span>
                            </div>
                            <div class="column">
                                <span class="item-data">{{ $property->bathrooms }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column">
                                <span class="item-title">Garages</span>
                            </div>
                            <div class="column">
                                <span class="item-data">{{ $property->garages }}</span>
                            </div>
                            <div class="column">
                                <span class="item-title">HOA Fees</span>
                            </div>
                            <div class="column">
                                <span class="item-data">${{ number_format($property->hoa_fees, 2, '.', ',') }}</span>
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
                        <form method="POST" action="{{ url('/properties/' . $property->slug) }}" id="contact-form">
                            {{ csrf_field() }}
                            <b-field>
                                <b-input name="name" placeholder="Your name" required></b-input>
                            </b-field>
                            <b-field>
                                <b-input name="email" type="email" placeholder="Your email" required></b-input>
                            </b-field>
                            <b-field>
                                <b-input name="number" placeholder="Your contact Number" required></b-input>
                            </b-field>
                            <b-field>
                                <b-input name="message" maxlength="200" type="textarea" placeholder="Hi! I am interested in the property because..."></b-input>
                            </b-field>
                            <div class="g-recaptcha"
                                data-sitekey="{{ env('RECAPTCHA_SITE') }}"
                                data-callback="submitContactForm"
                                data-size="invisible">
                            </div>
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="notification is-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item" @click="validateForm($event)">
                            <span>
                                Send message
                            </span>
                        </p>
                    </footer>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column is-two-thirds">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Property Details
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {!! $property->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
