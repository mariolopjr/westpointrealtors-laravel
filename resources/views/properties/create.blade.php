@extends('layouts.frontend')

@section('content')
    <h1>Create a property</h1>

    <hr>

    <div class="container">
        <form method="POST" action="/properties">

            {{ csrf_field() }}

            <div class="field">
                <label class="label" for="title">Title</label>
                <p class="control">
                    <input class="input" type="text" name="title" id="title" required />
                </p>
            </div>
            <div class="field">
                <label class="label" for="type">Select property type</label>
                <p class="control">
                    <span class="select">
                        <select name="type" id="type">
                            <option value="1">Single Family Home</option>
                            <option value="2">Apartment</option>
                            <option value="3">Condo</option>
                            <option value="4">Townhouse</option>
                        </select>
                    </span>
                </p>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required />
            </div>
            <div class="form-group">
                <label for="status">Select property status</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">Available</option>
                    <option value="2">Coming Soon</option>
                    <option value="3">Pending</option>
                    <option value="4">Under Contract</option>
                    <option value="5s">Sold</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" min="0" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="60" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="home_size">Home Size</label>
                <input type="number" step="0.01" min="0" name="home_size" id="home_size">
            </div>
            <div class="form-group">
                <label for="lot_size">Lot Size</label>
                <input type="number" step="0.01" min="0" name="lot_size" id="lot_size">
            </div>
            <div class="form-group">
                <label for="bedrooms">Bedrooms</label>
                <input type="number" step="1" min="1" name="bedrooms" id="bedrooms">
            </div>
            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" step="1" min="1" name="bathrooms" id="bathrooms">
            </div>
            <div class="form-group">
                <label for="garages">Garages</label>
                <input type="number" step="1" min="0" name="garages" id="garages">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" id="year">
            </div>
            <div class="form-group">
                <label for="hoa_fees">HOA Fees</label>
                <input type="number" step="0.01" min="0" name="hoa_fees" id="hoa_fees">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        @include('partials.formerrors')

    </div>
@endsection
