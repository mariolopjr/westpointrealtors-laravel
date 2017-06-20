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
    return view('index', App\Property::favorite()->active()->get());
});

// Properties
Route::get('/properties', 'PropertyController@index');
Route::post('/properties', 'PropertyController@store');
Route::get('/properties/create', 'PropertyController@create');
Route::get('/properties/{property}', 'PropertyController@show');
