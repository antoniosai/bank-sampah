<?php

class TabunganController extends Base_Controller {

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
