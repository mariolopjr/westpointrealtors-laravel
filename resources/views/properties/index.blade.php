@extends('layouts.frontend')

@section('pageTitle', 'Properties - West Point Real Estate')

@section('content')
    {{-- <nav class="navbar has-shadow property-nav">
        <div class="container">
            <div class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item">
                        <span class="icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                    <form>
                        <div class="navbar-item">
                            <input class="input hidden-surround" type="text" name="search" id="search" placeholder="  Search by..." />
                        </div>
                    </form>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">Sort By:</div>
                    <a class="navbar-item is-tab"><i class="material-icons">list</i></a>
                    <a class="navbar-item is-tab"><i class="material-icons">map</i></a>
                </div>
            </div>
        </div>
    </nav> --}}
    <div class="container property-list">
        @if($properties->count() > 0)
            @foreach($properties as $property)
                @if(($loop->iteration - 1) % 4 == 0 || $loop->first)
                    <div class="columns">
                @endif
                @include('properties.card')
                @if($loop->iteration % 4 == 0 || $loop->last)
                    </div>
                @endif
            @endforeach
        @else
            <div class="no-properties-list is-uppercase has-text-centered">
                <h1>No properties available</h1>
            </div>
        @endif
    </div>
    {{ $properties->appends(Request::except('page'))->links() }}
@endsection
