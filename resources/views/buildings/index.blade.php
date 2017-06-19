@extends('layouts.frontend')

@section('content')
    @foreach($buildings as $building)
        <li>{{ $building->title }}</li>
    @endforeach
@endsection