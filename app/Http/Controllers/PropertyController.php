<?php

namespace App\Http\Controllers;

use App\Property;
use App\Repositories\Properties;
use Illuminate\Http\Request;
use JavaScript;

class PropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'status', 'type']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Repositories\Properties $properties
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Properties $properties)
    {
        // Get all latest properties with status relationship
        $properties = $properties->latest()->with('status');

        // Apply filters
        $properties = $request->has('status') ? $properties->statusName($request->input('status')) : $properties->statusNotName('Sold'); // By default, return all but sold properties
        $properties = $request->has('bedrooms') && $request->has('brl') ? $properties->where('bedrooms', $this->conditionalToSymbol($request->input('brl')), $request->input('bedrooms')) : $properties;
        $properties = $request->has('active') ? $properties->active($request->input('active')) : $properties->active(); // By default, return only active properties

        // Apply sorting
        $properties = $request->has('priceasc') && $request->input('priceasc') === "y" ? $properties->orderBy('price', 'asc') : $properties->orderBy('price', 'desc');

        $properties = $properties->paginate(16);
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:250',
            'type' => 'required',
            'address' => 'required',
            'status_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'home_size' => 'required',
            'lot_size' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'garages' => 'required',
            'year' => 'required',
            'hoa_fees' => 'required'
        ]);

        $property = new Property(request([
            'title',
            'type',
            'address',
            'status_id',
            'price',
            'description',
            'home_size',
            'lot_size',
            'bedrooms',
            'bathrooms',
            'garages',
            'year',
            'hoa_fees'
        ]));
        $property->user_id = auth()->id();
        $property
            ->addAllMediaFromRequest()
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('images', 'images');
            });
        $property->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        JavaScript::put([
            'address' => str_replace(array("\r", "\n"), ', ', $property->address),
        ]);

        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status()
    {
        $statuses = \App\Status::all();
        return compact('statuses');
    }

    public function type()
    {
        $types = \App\Type::all();
        return compact('types');
    }

    public function conditionalToSymbol($conditional)
    {
        switch($conditional) {
            case "gt":
                return ">";

            case "gte":
                return ">=";

            case "eq":
                return "=";

            case "lt":
                return "<";

            case "lte":
                return "<=";

            case "neq":
                return "<>";

            default:
                return "=";
        }
    }
}
