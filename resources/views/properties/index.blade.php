@extends('layouts.frontend')

@section('content')
    @foreach($properties as $property)
        <li>{{ $property->title }}</li>
    @endforeach
@endsection