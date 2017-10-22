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

    if(App\Property::count() == 0) {
        $properties = collect(new App\Property);
        return view('index', compact('properties'));
    }

    $properties = App\Property::inRandomOrder()->favorite()->active()->with('status')->get();

    if($propertiesCount = count($properties) < 5) {
        $additionalProperties = App\Property::latest()->favorite(false)->active()->get();

        if(count($additionalProperties) > 4) {
            $start = random_int(0, count($additionalProperties) - (5 - $propertiesCount));
            $additionalProperties = $additionalProperties->slice($start, 4 - $propertiesCount);
        }

        foreach ($additionalProperties as $property) {
            $properties->push($property);
        }
    }
    $properties = $properties->slice(0, 4);

    return view('index', compact('properties'));
});

Route::get('/forms', function () {
    return view('docs');
});

Route::get('/forms/{file}', function () {
    return response()->file('/public/files/' . $file);
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
    Route::get('/property/{id}/picture/{val}/delete', 'PropertyController@deletePicture')
        ->name('deletePicture');
});

// Agents
Route::get('/agents', 'AgentController@index');
Route::get('/agents/{agent}', 'AgentController@show');

Auth::routes();
