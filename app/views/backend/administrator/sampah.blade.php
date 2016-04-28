@extends('backend.templates.layout')

@section('style_head')
	@include('partials.datatable')
@stop

@section('title')
	Sampah
@stop

@section('header')
	Sampah <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addSampah">Tambah Sampah</button>
@stop

@section('nav2')
active
@stop

@section('content')
<div class="row">
	<div class="col-md-6">
		{{ Datatable::table()
			->addColumn('Nama','Harga (kg)', 'Aksi')
			->setUrl(route('api.sampah'))
			->setOptions('aaSorting', array(
			array(1, 'desc')
			))
			->setClass('table table-striped')
			->render()
		}}
	</div>
	<div class="col-md-6">
		<!-- Modal -->
		<div class="modal fade" id="addSampah" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Sampah</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="get" action="{{ action('SampahController@postAddSampah') }}">
							<div class="form-group">
								<label for="sampah">Nama Sampah</label>
								<input type="text" class="form-control" name="nama" placeholder="Masukan Sampah">
							</div>
							<div class="form-group">
								<label for="harga">Harga Sampah / Kg:</label>
								<input type="number" class="form-control" name="harga" placeholder="Masukan harga per Kg">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
