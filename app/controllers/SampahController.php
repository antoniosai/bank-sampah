<?php

class SampahController extends BaseController{

	public function sampahApi(){
			$query = DB::table('sampah')
			->select('sampah.nama', 'sampah.harga')->get();

			$data = new Illuminate\Database\Eloquent\Collection($query);

			return Datatable::collection($data)
			// ->addColumn('created_at', function($model){

			// 	$unix = strtotime($model->created_at);
			// 	$hari = date("D", $unix);
			// 	$hari = str_replace('Sun', 'Minggu', $hari);
			// 	$hari = str_replace('Mon', 'Senin', $hari);
			// 	$hari = str_replace('Tue', 'Selasa', $hari);
			// 	$hari = str_replace('Wed', 'Rabu', $hari);
			// 	$hari = str_replace('Thu', 'Kamis', $hari);
			// 	$hari = str_replace('Fri', 'Jum\'at', $hari);
			// 	$hari = str_replace('Sat', 'Sabtu', $hari);

			// 	return '<div style="text-align: center;">' . $hari . '<br/>' . date('d M Y H:i', strtotime($model->created_at)) . '</div>';
			// })
			->addColumn('nama', function($model){
				return $model->nama;
			})
			->addColumn('tempat_lahir', function($model){
				$rupiah=number_format($model->harga,0,',','.');
				return 'Rp '. $rupiah ;
			})
			->searchColumns('nama','harga')
			->make();
		}

	public function getSampahAll(){
		return View::make('backend.administrator.sampah');
	}

	public function postAddSampah(){
		$sampah = new Sampah;
		$sampah->nama = Input::get('nama');
		$sampah->harga = Input::get('harga');
		$sampah->save();

		return Redirect::back()->with('successMessage', 'Sampah baru berhasil disimpan');
	}
}
