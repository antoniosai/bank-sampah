@extends('backend.templates.layout')

@section('style_head')
	@include('partials.datatable')
@stop

@section('title')
Nasabah
@stop

@section('header')
Nasabah <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addNasabah">Tambah Nasabah</button>
@stop

@section('content')
{{ Datatable::table()
	->addColumn('Nama','TTL', 'Alamat', 'No Telp', 'Terdaftar', 'Disunting')
	->setUrl(route('api.nasabah'))
	->setOptions('aaSorting', array(
		  array(00, 'desc')
		))
	->setClass('table table-striped')
	->render()
}}

<!-- Modal -->
<div class="modal fade" id="addNasabah" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Nasabah Baru</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="get" action="{{ action('NasabahController@postAddNasabah') }}">
					<div class="form-group">
						<label for="sampah">Nama Nasabah</label>
						<input type="text" class="form-control" name="nama" placeholder="Masukan Nama Nasabah">
					</div>
					<div class="form-group">
						<label for="harga">Tempat Lahir</label>
						<input type="text" class="form-control" name="tempat_lahir" placeholder="Contoh: Garut, Bandung dll.">
					</div>
					<div class="form-group">
						<label for="harga">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tanggal_lahir">
					</div>
					<div class="form-group">
						<label for="harga">Alamat</label><br/>
						<textarea name="alamat" rows="4" cols="40"></textarea>
					</div>
					<div class="form-group">
						<label for="harga">No. Telephone</label>
						<input type="text" class="form-control" name="no_telp" placeholder="08111111111">
					</div>
					<button type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@stop
