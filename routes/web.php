<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $properties = App\Property::inRandomOrder()->favorite()->active()->with('status')->get();

    if($propertiesCount = count($properties) < 4) {
        $additionalProperties = App\Property::latest()->favorite(false)->active()->get();
        $start = random_int(0, count($additionalProperties) - (5 - $propertiesCount));
        $additionalProperties = $additionalProperties->slice($start, 4 - $propertiesCount);

        foreach ($additionalProperties as $property) {
            $properties->push($property);
        }
    }
    $properties = $properties->slice(0, 4);

    return view('index', compact('properties'));
});

// Properties
Route::get('/properties', 'PropertyController@index');
Route::post('/properties', 'PropertyController@store');
Route::get('/properties/create', 'PropertyController@create');
Route::get('properties/search', 'PropertyController@search');
Route::get('/properties/{property}', 'PropertyController@show');

// Agents
Route::get('/agents', 'AgentController@index');
Route::get('/agents/{agent}', 'AgentController@show');

Auth::routes();
