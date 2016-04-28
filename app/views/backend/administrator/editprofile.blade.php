@extends('backend.templates.layout')

@section('style_head')
@include('partials.datatable')
@stop

@section('title')
Edit Profile
@stop

@section('header')
Edit Profile
@stop

@section('nav1')
active
@stop

@section('content')
<form action="{{ action('AdminController@postEditProfile')}}" method="post">
  <input type="hidden" name="id" value="{{ $user->id}}" >
<div class="row">
  <div class="col-md-4">
    <h3>Data Pribadi</h3>
    <div class="form-group">
      <input class="form-control" type="text" name="first_name" value="{{ $user->first_name}}">
    </div>
    <div class="form-group">
      <input class="form-control" type="text" name="last_name" value="{{ $user->last_name}}">
    </div>
    <input type="submit" name="name" value="Simpan" class="btn btn-success">
  </div>
  <div class="col-md-4">
    <h3>Ganti Password</h3>
    <div class="form-group">
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <input type="password" name="password_confirmation" class="form-control">
      <small>Kosongkan jika password tidak ingin diganti</small>
    </div>
  </div>
</div>
</form>
@stop
