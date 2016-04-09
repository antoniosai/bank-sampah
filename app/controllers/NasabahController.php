<?php

class NasabahController extends BaseController{

		public function nasabahApi(){
			$query = DB::table('nasabah')
			->select('nasabah.id', 'nasabah.nama', 'nasabah.tempat_lahir', 'nasabah.tanggal_lahir', 'nasabah.alamat','nasabah.no_telp','nasabah.created_at','nasabah.updated_at')
			->orderBy('nasabah.created_at', 'asc')->get();

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
				// return '<a href="'.URL::route('nasabah.show', $model->id).'"> '.$model->nama.'</a>';

				return '<a href="'.URL::route('nasabah.show', $model->id).'">' . $model->nama . '</a>';
			})
			->addColumn('tempat_lahir', function($model){
				return $model->tempat_lahir. ', ' . $model->tanggal_lahir;
			})
			->addColumn('alamat', function($model){
				return $model->alamat;
			})
			->addColumn('no_telp', function($model){
				return $model->no_telp;
			})
			->addColumn('created_at', function($model){
				return $model->created_at;
			})
			->addColumn('updated_at', function($model){
				return $model->updated_at;
			})
			->searchColumns('nama','tempat_lahir','tanggal_lahir','alamat','no_telp', 'created_at', 'updated_at')
			->make();
		}

		public function getNasabahAll(){
			return View::make('backend.administrator.nasabah');
		}

		public function getNasabahById($id){
			$nasabah = Nasabah::find($id);

			return View::make('backend.administrator.nasabahbyid')->with('nasabah', $nasabah);
		}

		public function postAddNasabah(){
			$nasabah = new Nasabah;
			$nasabah->nama = Input::get('nama');
			$nasabah->tempat_lahir = Input::get('tempat_lahir');
			$nasabah->tanggal_lahir = Input::get('tanggal_lahir');
			$nasabah->alamat = Input::get('alamat');
			$nasabah->no_telp = Input::get('no_telp');
			$nasabah->save();

			return Redirect::back()->with('successMessage', 'Nasabah baru berhasil disimpan');
		}

		public function postEditNasabah($id){
			$id = Input::get('id');
			$nasabah = Nasabah::find($id);
			$nasabah->nama = Input::get('nama');
			$nasabah->tempat_lahir = Input::get('tempat_lahir');
			$nasabah->tanggal_lahir = Input::get('tanggal_lahir');
			$nasabah->alamat = Input::get('alamat');
			$nasabah->no_telp = Input::get('no_telp');
			$nasabah->save();

			return Redirect::back()->with('successMessage', 'Nasabah berhasil diedit');
		}

		public function getDeleteNasabah($id){

		}

}
