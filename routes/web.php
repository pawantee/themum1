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

Route::group(['middleware' => ['web', 'auth']], function () {
	
	Route::resource('mums', 'MumController');
	
	Route::resource('kids', 'KidController');
	Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'KidController@autocomplete'));

	Route::resource('vaccines', 'VaccineController');
	Route::resource('injectvaccines', 'InjectVaccineController');
	Route::get('kidapi',array('as'=>'kidapi','uses'=>'InjectVaccineController@kidapi'));
	Route::get('vaccineapi',array('as'=>'vaccineapi','uses'=>'InjectVaccineController@vaccineapi'));

	 //Upload Image
    Route::get('profiles', 'ProfileController@index')->name('profiles');

    Route::post('profiles', 'ProfileController@upload')->name('upload');

});

Auth::routes();

Route::get('/', 'HomeController@index')->name('search');
