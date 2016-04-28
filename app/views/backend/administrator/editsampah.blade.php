@extends('backend.templates.layout')

@section('style_head')
	@include('partials.datatable')
@stop

@section('title')
	Edit Sampah
@stop

@section('nav2')
active
@stop

@section('header')
Edit Sampah {{ $sampah->nama }}
@stop

@section('content')
<form action="{{ action('SampahController@postEditSampah') }}" method="post">
	<input type="hidden" name="id" value="{{ $sampah->id}}">
	<div class="form-group">
		<input type="name" name="nama" value="{{ $sampah->nama}}" class="form-control">
	</div>
	<div class="form-group">
		<input type="number" name="harga" value="{{ $sampah->harga }}" class="form-control">
	</div>
	<input type="button" name="submit" value="SimpanP">
</form>
@stop
