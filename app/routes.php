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
	return View::make('frontend.login')->with('successMessage', 'Silahkan Masuk');
});

Route::get('/api/nasabah', array('as' => 'api.nasabah', 'uses' => 'NasabahController@nasabahApi'));
Route::get('/api/sampah', array('as' => 'api.sampah', 'uses' => 'SampahController@sampahApi'));
Route::get('/api/tabungan', array('as' => 'api.tabungan', 'uses' => 'TabunganController@tabunganApi'));
Route::get('/api/teller', array('as' => 'api.teller', 'uses' => 'AdminController@tellerApi'));

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
		Route::get('edit/sampah/{id}', array('as'=>'sampah.edit','uses'=>'SampahController@getEditSampah'));
		Route::post('edit/sampah', 'SampahController@postEditSampah');
		Route::get('show/teller', 'AdminController@getShowTeller');
		Route::get('show/teller/{id}', array('as'=>'teller.show','uses'=>'AdminController@getShowTellerById'));
		Route::get('bantuan', 'BantuanController@getShowBantuan');
		Route::get('laporan', 'LaporanController@getShowLaporan');

		Route::get('edit/profile', 'AdminController@getEditProfile');
		Route::post('edit/profile', 'AdminController@postEditProfile');


		Route::post('debit', 'NasabahController@debit');
		Route::post('kredit', 'NasabahController@kredit');
	});
});

Route::get('add/sampah', 'SampahController@postAddSampah');
Route::get('add/nasabah', 'NasabahController@postAddNasabah');
Route::get('edit/nasabah/{id}', 'NasabahController@postEditNasabah');

Route::get('test', function(){
	$year = date('y');
	$no_rek = $year.rand(0000,1000);
	return $no_rek;
});

Route::get('user', 'AdminController@getAllUser');
