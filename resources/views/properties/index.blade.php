@extends('layouts.frontend')

@section('content')
    <nav class="nav has-shadow property-nav">
        <div class="container">
            <div class="nav-left">
                <div class="nav-item"><span class="icon"><i class="material-icons">search</i></span></div>
                <form>
                    <div class="nav-item">
                        <input class="input hidden-surround" type="text" name="search" id="search" placeholder="  Search by..." />
                    </div>
                </form>
            </div>
            <div class="nav-right">
                <div class="nav-item">Sort By:</div>
                <a class="nav-item is-tab">Home</a>
                <a class="nav-item is-tab">Properties</a>
                <a class="nav-item is-tab">Forms</a>
                <a class="nav-item is-tab">Contact</a>
            </div>
        </div>
    </nav>
    @foreach($properties as $property)
        <li>{{ $property->title }}</li>
    @endforeach
@endsection