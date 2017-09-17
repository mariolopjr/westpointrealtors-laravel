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
Route::group(['prefix' => 'properties', 'as' => 'properties.'], function () {
    Route::get('/', 'PropertyController@index')
        ->name('index');
    Route::post('/', 'PropertyController@store')
        ->name('store');
    Route::get('/{property}', 'PropertyController@show')
        ->name('show');
    Route::get('/create', 'PropertyController@create')
        ->name('create');
    Route::get('/status', 'PropertyController@status')
        ->name('status');
    Route::get('/type', 'PropertyController@type')
        ->name('type');
});

// Agents
Route::get('/agents', 'AgentController@index');
Route::get('/agents/{agent}', 'AgentController@show');

Auth::routes();
