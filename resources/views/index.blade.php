@extends('layouts.frontend')

@section('content')
    <section class="hero is-large is-bottom-gradient">
        <div class="hero-body index-hero">
            <div class="container has-text-centered">
                <form>
                    <div class="column is-half is-offset-one-quarter index-search">
                        <div class="field has-addons add-shadow">
                            <p class="control">
                                <input class="input" type="text" placeholder="Enter an address, ZIP Code, House Feature">
                            </p>
                            <p class="control">
                                <a class="button is-info">
                                    Find
                                </a>
                            </p>
                        </div>
                    </div>
                </form>

                <h2 class="subtitle index-subtitle">
                    Our favorite properties
                </h2>

                <div class="columns">
                    @foreach($properties->slice(0, 4) as $property)
                        @include('properties.card')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
