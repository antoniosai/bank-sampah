<?php

class NasabahController extends BaseController{
		public function nasabahApi(){
			$query = DB::table('nasabah')
			->select('nasabah.id', 'nasabah.nama', 'nasabah.no_rek','nasabah.tempat_lahir', 'nasabah.tanggal_lahir', 'nasabah.alamat','nasabah.no_telp','nasabah.created_at','nasabah.updated_at')
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
			->addColumn('no_rek', function($model){
				return $model->no_rek;
			})
			->addColumn('nama', function($model){
				return '<a href="'.URL::route('nasabah.show', $model->id).'">' . $model->nama . '</a>';
			})
			->addColumn('tempat_lahir', function($model){
				$unix = strtotime($model->tanggal_lahir);
				$bulan = date("m", $unix);
				$bulan = str_replace('01', 'Januari', $bulan);
				$bulan = str_replace('02', 'Februari', $bulan);
				$bulan = str_replace('03', 'Maret', $bulan);
				$bulan = str_replace('04', 'April', $bulan);
				$bulan = str_replace('05', 'Mai', $bulan);
				$bulan = str_replace('06', 'Juni', $bulan);
				$bulan = str_replace('07', 'Juli', $bulan);
				$bulan = str_replace('08', 'Agustus', $bulan);
				$bulan = str_replace('09', 'September', $bulan);
				$bulan = str_replace('10', 'Oktober', $bulan);
				$bulan = str_replace('11', 'November', $bulan);
				$bulan = str_replace('12', 'Desember', $bulan);
				$tanggal = date('d', $unix) . ' ' .$bulan . ' ' . date('Y', $unix);

				return $model->tempat_lahir. ', ' . $tanggal;
			})
			->addColumn('alamat', function($model){
				return $model->alamat;
			})
			->addColumn('no_telp', function($model){
				return $model->no_telp;
			})
			->addColumn('created_at', function($model){
				$unix = strtotime($model->created_at);
				$bulan = date("m", $unix);
				$bulan = str_replace('01', 'Januari', $bulan);
				$bulan = str_replace('02', 'Februari', $bulan);
				$bulan = str_replace('03', 'Maret', $bulan);
				$bulan = str_replace('04', 'April', $bulan);
				$bulan = str_replace('05', 'Mai', $bulan);
				$bulan = str_replace('06', 'Juni', $bulan);
				$bulan = str_replace('07', 'Juli', $bulan);
				$bulan = str_replace('08', 'Agustus', $bulan);
				$bulan = str_replace('09', 'September', $bulan);
				$bulan = str_replace('10', 'Oktober', $bulan);
				$bulan = str_replace('11', 'November', $bulan);
				$bulan = str_replace('12', 'Desember', $bulan);
				$tanggal = date('d') . ' ' .$bulan . ' ' . date('Y');
				return $tanggal;
			})
			->searchColumns('nama','tempat_lahir','tanggal_lahir','alamat','no_telp', 'created_at', 'updated_at')
			->make();
		}

		public function getNasabahAll(){
			return View::make('backend.administrator.nasabah');
		}

		public function getNasabahById($id){
			$nasabah = Nasabah::find($id);
			$sampah = Sampah::all();

			return View::make('backend.administrator.nasabahbyid')->with('nasabah', $nasabah)->with('sampah', $sampah);
		}

		public function postAddNasabah(){
			$year = date('y');

			$nasabah = new Nasabah;
			$nasabah->nama = Input::get('nama');
			$nasabah->tempat_lahir = Input::get('tempat_lahir');
			$nasabah->no_rek = $no_rek = $year.rand(0000,1000);
			$nasabah->tanggal_lahir = Input::get('tanggal_lahir');
			$nasabah->alamat = Input::get('alamat');
			$nasabah->no_telp = Input::get('no_telp');
			$nasabah->saldo = 0;
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

		public function kredit(){

			$id = Input::get('id');
			$kredit = Input::get('kredit');

			$tabungan = new Tabungans;
			$tabungan->nasabah_id = $id;
			$tabungan->kredit = $kredit;
			$nasabah = Nasabah::find($id);
			$tabungan->saldo_sementara = $nasabah->saldo - $kredit;
			$nasabah->saldo = $nasabah->saldo - $kredit;
			$nasabah->save();
			$tabungan->save();
			return Redirect::back()->with('successMessage', 'Kredit telah ditambahkan ke nasabah {{ $nasabah->nama }} sebesar Rp. {{ $kredit}} ');
		}

		public function debit(){
			$id = Input::get('id');
			$debit = Input::get('debit');;

			// $tabungan = new Tabungans;
			// $tabungan->nasabah_id = $id;
			// $tabungan->debit = $debit;
			// $nasabah = Nasabah::find($id);
			// $tabungan->saldo_sementara = $nasabah->saldo + $debit;
			// $nasabah->saldo = $nasabah->saldo + $debit;
			// $nasabah->save();
			// $tabungan->save();
			// return Redirect::back()->with('successMessage', 'Debit telah ditambahkan ke nasabah sebesar Rp. {{ $kredit}} ');
			// $id = Input::get('id');
			// $idSampah[] = Input::get('sampah');
			// $qty[] = Input::get('qty');
			// $nasabah = Nasabah::find($id);
			// return Input::all();
			// $dataSampah = Sampah::find($idSampah);
			// $price = $idSampah->price;
			// return $nasabah::simpan($id,$idSampah, $qty);
			// return $nasabah->sampah()->attach($idSampah, ['qty' => $qty, 'price' => 111]);
			// foreach ($variable as $key => $value) {
			// if ($procc) {
			// 	'Data Sukses';
			// }

			// }
			//
			// $kredit = Input::get('kredit');
			//
			// $tabungan = new Tabungans;
			// $tabungan->nasabah_id = $id;
			// $tabungan->kredit = $kredit;
			// if ($tabungan->save()) {
			// 	$nasabah->saldo = $nasabah->saldo - $kredit;
			// 	$nasabah->save();
			// 	return Redirect::back()->with('successMessage', 'Kredit telah ditambahkan ke nasabah {{ $nasabah->nama }} sebesar Rp. {{ $kredit}} ');
			// }
			$nasabah = Nasabah::find($id);
			$totalHarga = 0;
			foreach (Input::get('rows') as $key => $count ){
                $sampahId = Input::get('sampah_'.$count);
                $qty = Input::get('qty_'.$count);

				$sampah = Sampah::find($sampahId);
				$nasabah->sampah()->attach($sampahId, ['qty' => $qty, 'price' => $price = $qty * $sampah->harga]);
				$totalHarga = $totalHarga + $price;
            }
			// $tabungan = new Tabungans;
			// $tabungan->nasabah_id = $id;
			// $tabungan->debit = $totalHarga;
			// $nasabah = Nasabah::find($id);
			// $tabungan->saldo_sementara = $nasabah->saldo + $totalHarga;
			// $nasabah->saldo = $nasabah->saldo + $totalHarga;
			// $nasabah->save();
			// $tabungan->save();
			// return Redirect::back()->with('successMessage', 'Sukses melakukan deposit sampah');
		}

		public function getKonfirmasi(){

		}
}
