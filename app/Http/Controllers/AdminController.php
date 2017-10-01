<?php

namespace App\Http\Controllers;

use App\Property;
use App\Repositories\Properties;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function propertyList()
    {
        // Get all latest properties with status relationship
        $properties = Property::latest()->active()->with('status')->with('type')->get();

        foreach ($properties as $property) {
            $property->mainImage = url($property->getFirstMediaUrl('images', 'thumb'));
        }

        return view('admin.properties', compact('properties'));
    }
}
