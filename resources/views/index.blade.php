@extends('layouts.frontend')

@section('content')
    <section class="hero is-small">
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
                                    <i class="fa fa-search" aria-hidden="true"></i> Find
                                </a>
                            </p>
                            <div class="search-advanced columns hidden">
                                <div class="column is-half"></div>
                                <div class="column is-half"></div>
                                <div class="column is-half"></div>
                                <div class="column is-half"></div>
                                <div class="column is-half"></div>
                                <div class="column is-half"></div>
                                <div class="column"></div>
                            </div>
                        </div>
                    </div>
                </form>

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
            </div>
        </div>
    </section>
@endsection
