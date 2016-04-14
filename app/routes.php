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

Route::get('admin', function(){
	// return View::make('backend.administrator.nasabah');
});

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
	// $nasabah = Nasabah::find(1);

	// $sampah = Sampah::find(1);

	// $data = $nasabah->sampah()->attach(1, ['qty' => 0.5, 'price' => 0.5 * 1000]);

$nasabah = Nasabah::find(2);
$nasabah->simpan(2, 5);

	$idNasabah = Nasabah::find(1)->id;

										echo $tabbb = Temp::select('price')->where('created_at', '>', date('Y-m-d 00:00:00'))->where('created_at', '<', date('Y-m-d 23:59:59'))->get();
										$total = 0;
										foreach ($tabbb as $omo) {
											$total = $total + $omo->price;
										}
										echo $total;
// 										 $aneh = array(
// 										 	array('id' => 1, 'nasabah_id' => 1, 'debit' => 10000),
// 										 	array('id' => 2, 'nasabah_id' => 2, 'debit' => 10000)
// 										 );
//

// DB::table('tabungan')->insert($aneh);
// $tabungan  = new Tabungans;
// $tabungan->nasabah_id = 3;
// $tabungan->kredit = $data;
// $tabungan->save();
//
// return $tabungan;



	// $nasabah = Nasabah::find(1);
	// echo $nasabah;

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
