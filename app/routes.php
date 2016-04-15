<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/api/nasabah', array('as' => 'api.nasabah', 'uses' => 'NasabahController@nasabahApi'));
Route::get('/api/sampah', array('as' => 'api.sampah', 'uses' => 'SampahController@sampahApi'));
Route::get('/api/tabungan', array('as' => 'api.tabungan', 'uses' => 'TabunganController@tabunganApi'));

Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');

Route::get('register', 'UserController@getRegister');
Route::get('register', 'UserController@postRegister');

Route::get('logout', 'UserController@getLogout');

Route::group(['prefix' => '/','before'=>'auth'],function(){
	Route::group(['prefix' => 'admin', 'before' => 'administrator'], function(){
		Route::get('/', 'AdminController@getDashboard');
		Route::get('show/nasabah', 'NasabahController@getNasabahAll');
		Route::get('show/nasabah/{id}', array('as'=>'nasabah.show','uses'=>'NasabahController@getNasabahById'));
		Route::get('show/sampah', 'SampahController@getSampahAll');

	});
});

Route::get('add/sampah', 'SampahController@postAddSampah');
Route::get('add/nasabah', 'NasabahController@postAddNasabah');
Route::get('edit/nasabah/{id}', 'NasabahController@postEditNasabah');