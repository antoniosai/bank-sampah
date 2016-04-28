<?php
class AdminController extends BaseController{

  public function tellerApi(){
    $query = DB::table('users')
    ->join('users_groups', 'users.id', '=', 'users_groups.user_id')
    ->join('groups', 'groups.id', '=', 'users_groups.group_id')
    ->where('users_groups.group_id', '=', 2)
    ->select('users.id', 'users.first_name', 'users.last_name', 'users.created_at','users.updated_at')
    ->orderBy('users.created_at', 'asc')->get();

    $data = new Illuminate\Database\Eloquent\Collection($query);

    return Datatable::collection($data)
    ->addColumn('nama', function($model){
      $nama = $model->first_name . ' ' . $model->last_name;
      return '<a href="'.URL::route('teller.show', $model->id).'">' .$nama. '</a>';
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
    })->addColumn('updated_at', function($model){
      $unix = strtotime($model->updated_at);
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
    ->searchColumns('nama','created_at', 'updated_at')
    ->make();
  }

  public function getDashboard(){
    $id = Sentry::getUser()->id;
    $user = User::find($id);
    return View::make('backend.administrator.index')->with('user', $user);
  }

  public function getEditProfile(){
    $id = Sentry::getUser()->id;
    $user = User::find($id);
    return View::make('backend.administrator.editprofile')->with('user', $user);
  }

  public function getShowTeller(){
    $data = DB::table('users')->get();
    // $data = User::all();
    // $admin = Sentry::findGroupByName('teller');
    // return $user = $data->inGroup($admin);
    return View::make('backend.administrator.teller');
  }

  public function getShowTellerById($id){

  }

  public function postEditProfile(){
    $id = Input::get('id');
    $user = User::find($id);
    $user->first_name = Input::get('first_name');
    $user->last_name = Input::get('last_name');
    $user->save();

    if ($user) {
      return Redirect::back()->with('successMessage', 'Selamat Profile Anda telah berhasil diperbaharui');
    } else {
      return Redirect::back()->with('errorMessage', 'Ada yang salah...');
    }
  }
}
