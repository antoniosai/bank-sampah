<?php

class TabunganController extends BaseController {
  
  public function tabunganApi($idNasabah = 1){
			$query = DB::table('tabungan')
							 ->join('nasabah', 'nasabah.id', '=', 'tabungan.nasabah_id')
							 ->select('tabungan.created_at as tanggal', 'tabungan.debit', 'tabungan.kredit')
							 ->where('nasabah.id', '=', $idNasabah)
							 ->orderBy('tabungan.created_at', 'ASC');
							 $tabungan = $query->get();

			$data = new Illuminate\Database\Eloquent\Collection($tabungan);

			return Datatable::collection($data)
			->addColumn('tanggal', function($model){

				$unix = strtotime($model->tanggal);
				$hari = date("D", $unix);
				$hari = str_replace('Sun', 'Minggu', $hari);
				$hari = str_replace('Mon', 'Senin', $hari);
				$hari = str_replace('Tue', 'Selasa', $hari);
				$hari = str_replace('Wed', 'Rabu', $hari);
				$hari = str_replace('Thu', 'Kamis', $hari);
				$hari = str_replace('Fri', 'Jum\'at', $hari);
				$hari = str_replace('Sat', 'Sabtu', $hari);

				return '<div style="text-align: center;">' . $hari . '<br/>' . date('d M Y', strtotime($model->tanggal)) . '</div>';
			})
			->addColumn('tranksaksi', function($model){
				// return '<a href="'.URL::route('nasabah.show', $model->id).'"> '.$model->nama.'</a>';
        return 'Menabung sampah';
				// return '<a href="'.URL::route('nasabah.show', $model->id).'">' . $model->nama . '</a>';
			})
			->addColumn('debit', function($model){
				return $model->debit;
			})
			->addColumn('kredit', function($model){
				return $model->kredit;
			})
			->addColumn('saldo', function($model){
				return '5000';
			})
			->searchColumns('tanggal','tranksaksi','debit','kredit','saldo')
			->make();
		}

  public function getAddTabungan() {

  }

  public function postAddTabungan() {

    $users = DB::table('nasabah_sampahah')
             ->select(DB::raw('count(*) as user_count, status'))
             ->where('status', '<>', 1)
             ->groupBy('status')
             ->get();

    $tabungan = new Tabungan;
    $tabungan->nasabah_id = Input::get('nasabah_id');
    $tabungan->debit = Input::get('debit');
    $tabungan->kredit = Input::get('kredit');
    $tabungan->save();

    return Redirect::back()->with('successMessage', 'Tabungan baru telah berhasi dibuat');
  }

}
