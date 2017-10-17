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

Route::get('/mailable', function () {
    $property = App\Property::find(1);

    return new App\Mail\PropertyContact($property);
});

// Properties
Route::group(['prefix' => 'properties', 'as' => 'properties.'], function () {
    Route::get('/', 'PropertyController@index')
        ->name('index');
    Route::post('/', 'PropertyController@store')
        ->name('store');
    Route::get('/{property}', 'PropertyController@show')
        ->name('show');
    Route::post('/{property}', 'PropertyController@contact')
        ->name('contact');
});

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index')
        ->name('index');
    Route::post('/', 'AdminController@store')
        ->name('store');
    Route::get('/property', 'AdminController@propertyList')
        ->name('properties');
    Route::get('/property/create', 'PropertyController@create')
        ->name('create');
    Route::get('/property/{id}/edit', 'PropertyController@edit')
        ->name('edit');
    Route::post('/property/{id}/edit', 'PropertyController@update')
        ->name('update');
    Route::get('/property/{id}/active', 'PropertyController@getActive')
        ->name('getActive');
    Route::get('/property/{id}/active/{val}', 'PropertyController@setActive')
        ->name('setActive');
    Route::get('/property/{id}/favorite', 'PropertyController@getFavorite')
        ->name('getActive');
    Route::get('/property/{id}/favorite/{val}', 'PropertyController@setFavorite')
        ->name('setActive');
});

// Agents
Route::get('/agents', 'AgentController@index');
Route::get('/agents/{agent}', 'AgentController@show');

Auth::routes();
