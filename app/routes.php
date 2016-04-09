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

	// if($data){
	// 	echo "Sukses";
	// } else {
	// 	echo "gagal";
	// }

	$query = DB::table('nasabah')
			->select('nasabah.nama', 'nasabah.tempat_lahir', 'nasabah.tanggal_lahir', 'nasabah.alamat','nasabah.no_telp','nasabah.created_at','nasabah.updated_at')
			->orderBy('nasabah.created_at', 'asc')->get();

			return$data = new Illuminate\Database\Eloquent\Collection($query);

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
