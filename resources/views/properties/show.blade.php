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
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="price">
                            <span class="card-price">
                                ${{ number_format($property->price, 2) }}
                            </span>
                            <span class="is-pulled-right is-uppercase has-text-weight-light">{{ $property->status->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">

            </div>
        </div>
    </div>
@endsection
