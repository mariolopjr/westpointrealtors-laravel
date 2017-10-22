<?php

namespace App\Http\Controllers;

use App\Property;
use App\Mail\PropertyContact;
use App\Mail\PropertyContactSuccess;
use App\Mail\PropertyCustomer;
use App\Repositories\Properties;
use Illuminate\Http\Request;
use JavaScript;

class PropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'contact', 'show', 'status', 'type']);
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
        $statuses = \App\Status::all();
        $types = \App\Type::all();
        return view('properties.create', compact('statuses', 'types'));
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
        $fileAdders = $property
            ->addAllMediaFromRequest()
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('images', 'images');
            });
        $property->save();

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $property = Property::find($id);

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

        $property->update(request([
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
        $property->save();

        return redirect('/admin/property');
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

    public function edit($id)
    {
        $property = Property::find($id);
        $statuses = \App\Status::all();
        $types = \App\Type::all();
        return view('properties.edit', compact('property', 'statuses', 'types'));
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

    public function contact(Request $request, Property $property)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'message' => 'max:200',
            'g-recaptcha-response' => 'required'
        ]);

        if(isset($_POST['g-recaptcha-response'])) {
            $secretKey = env('RECAPTCHA_SECRET');
            $response = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];

            $reCaptchaValidationUrl = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$remoteIp");
            $result = json_decode($reCaptchaValidationUrl, TRUE);

            if(!$result['success'] == 1) {
                return redirect()->back()->withInput()->withErrors(['g-recaptcha' => 'You failed the Google ReCAPTCHA Bot Checker']);
            }
        }

        \Mail::to('westpointagents@gmail.com')->send(new PropertyContact($request, $property));
        \Mail::to($request->email)->send(new PropertyCustomer($request, $property));
        return new PropertyContactSuccess($request, $property);
    }

    public function getActive($id)
    {
        $active = Property::find($id)->active;
        return compact('active');
    }

    public function setActive($id, $val)
    {
        $property = Property::find($id);
        $property->active = $val;
        $property->save();
        return redirect()->to('/admin/property');
    }

    public function getFavorite($id)
    {
        $favorite = Property::find($id)->favorite;
        return compact('favorite');
    }

    public function setFavorite($id, $val)
    {
        $property = Property::find($id);
        $property->favorite = $val;
        $property->save();
        return redirect()->to('/admin/property');
    }

    public function deletePicture($id, $val)
    {
        $property = Property::find($id);
        $property->deleteMedia($val);
        return redirect()->to('/admin/property');
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
