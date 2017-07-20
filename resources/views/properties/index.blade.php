@extends('layouts.frontend')

@section('content')
    <nav class="nav has-shadow property-nav">
        <div class="container">
            <div class="nav-left">
                <div class="nav-item"><span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span></div>
                <form>
                    <div class="nav-item">
                        <input class="input hidden-surround" type="text" name="search" id="search" placeholder="  Search by..." />
                    </div>
                </form>
            </div>
            <div class="nav-right">
                <div class="nav-item">Sort By:</div>
                <a class="nav-item is-tab"><i class="material-icons">list</i></a>
                <a class="nav-item is-tab"><i class="material-icons">map</i></a>
            </div>
        </div>
    </nav>
    <div class="container property-list">
        @foreach($properties as $property)
            @if(($loop->iteration - 1) % 4 == 0 || $loop->first)
                <div class="columns">
            @endif
            @include('properties.card')
            @if($loop->iteration % 4 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
    </div>
    {{ $properties->appends(Request::except('page'))->links() }}
@endsection
