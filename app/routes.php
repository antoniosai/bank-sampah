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

Route::get('test', function(){
	$data = DB::table('nasabah')
	->join('nasabah_sampah', 'nasabah_sampah.nasabah_id', '=', 'nasabah.id')
	->join('sampah', 'nasabah_sampah.sampah_id', '=', 'sampah.id')
	->where('nasabah.id', '=', 1)
	->select('nasabah.nama as nasabah', 'sampah.nama as sampah', 'nasabah_sampah.qty as banyak', 'nasabah_sampah.created_at')
	->orderBy('nasabah_sampah.created_at', 'DESC')->limit(3);
	return $temp = $data->get();
});

Route::get('test2', function(){
	$sampah = new Sampah;
	$sampah->nama = Input::get('sampah');
	$sampah->harga = Input::get('harga');
	$sampah->save();

	if ($sampah) {
		return 'Success';
	} else {
		return 'Gagal';
	}
});
