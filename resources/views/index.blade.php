@extends('layouts.frontend')

@section('content')
    <section class="hero is-small">
        <div class="hero-body index-hero">
            <div class="container has-text-centered">
                {{-- <form action="{{ url('/properties') }}" method="get">
                    <advanced-search-form></advanced-search-form>
                </form> --}}

                <h2 class="title index-subtitle">
                    Our favorite properties
                </h2>

                <div class="columns">
                    @foreach($properties as $property)
                        @include('properties.card')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="hero is-small">
        <div class="container has-text-centered">
            <div class="hero-body">
                <h2 class="title">Our affiliates</h2>
                <div class="columns affiliates">
                    <div class="column">
                        <img src="{{ url('/images/sageLogo.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
