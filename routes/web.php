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
    return view('welcome');
});

Auth::routes();

// gym routes
Route::get('/home', 'GymController@index');
Route::get('/creategym','GymController@index');
Route::post('/creategym','GymController@store');
Route::get('/edit/{id}','GymController@edit');
Route::post('/updategyms/{id}','GymController@update');
Route::get('/deletegym/{id}','GymController@destroy');
Route::get('/restore','GymController@restoregym');
// people routes
Route::get('/people','PeopleController@index');
Route::post('/people','PeopleController@store');
Route::get('/try','PeopleController@try');