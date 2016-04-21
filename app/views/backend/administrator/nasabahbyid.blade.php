@extends('backend.templates.layout')

@section('style_head')
<script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
	var count = 1;

	$("#add_btn").click(function(){
		count += 1;
		$('#isi').append(
			'<tr class="records">'
			+ '<td ><div id="'+count+'">' + count + '</div></td>'
			+ '<td><div class="form-group"><select name="sampah_'+count+'" class="form-control" required><option value="all">-- Semua Status --</option>@foreach ($sampah as $data)<option value="{{ $data->id }}">{{ $data->nama }}</option>@endforeach</select></div></td>'
			+ '<td style="width: 30%"><div class="form-group"><div class="input-group"><input class="form-control" type="number" name="qty_'+count+'" value="" placeholder="Ex. 0.4, 0.5, 1.5" required><div class="input-group-addon"> kg</div></div></div></td>'
			+ '<td><a class="remove_item btn btn-danger btn-md" href="#" >Delete</a>'
			+ '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
		);
	});

	$(".remove_item").live('click', function (ev) {
		if (ev.type == 'click') {
			$(this).parents(".records").fadeOut();
			$(this).parents(".records").remove();
		}
	});
});
</script>
@stop

@section('title')
Nasabah
@stop

@section('nav3')
active
@stop

@section('header')
Data Nasabah
@stop

@section('content')
<?php

function format_rupiah($val){
	echo "Rp ". $rupiah=number_format($val,0,',','.');
}
?>
<div class="profile-widget profile-widget-info">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12 text-left">
				<div class="row">
					<div class="bio-row">
						<p><span>Nama</span>:  <strong>{{ $nasabah->nama}}</strong></p>
					</div>
					<div class="bio-row">
						<p><span>No Rek </span>: <strong>13-12312-44</strong></p>
					</div>
					<div class="bio-row">
						<p><span>TTL </span>: <strong> {{ $nasabah->tempat_lahir }}, {{ $nasabah->tanggal_lahir }}</strong></p>
					</div>
					<div class="bio-row">
						<p><span>Telepon </span>: <strong> {{ $nasabah->no_telp }}</strong></p>
					</div>
					<div class="bio-row">
						<p><span>Aksi </span>:
							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#depositSampah">Deposit Sampah</button>
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#kredit">Kredit</button>
						</p>
					</div>
					<div class="bio-row">
						<p><span>Saldo </span>: <strong> {{ "Rp ". number_format($nasabah->saldo,0,',','.')  }}</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- page start-->
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading tab-bg-info">
				<ul class="nav nav-tabs">
					<li class="active">
						<a data-toggle="tab" href="#tabungan">
							<i class="icon-home"></i>
							Tabungan
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#recent-activity">
							<i class="icon-user"></i>
							Aktivitas Nasabah
						</a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#edit-profile">
							<i class="icon-envelope"></i>
							Edit Profile
						</a>
					</li>
				</ul>
			</header>
			<div class="panel-body">
				<div class="tab-content">
					<div id="recent-activity" class="tab-pane">
						<div class="profile-activity">
							<div class="act-time">
								<div class="activity-body act-in">
									<span class="arrow"></span>
									<div class="text">
										<p class="attribution"><a href="#">Edgar Parks</a> at 4:25pm, 30th Octmber 2013</p>
										<p>An Awesome Piece of Cake For You Guys!</p>
									</div>
								</div>
							</div>
							<div class="act-time">
								<div class="activity-body act-in">
									<span class="arrow"></span>
									<div class="text">
										<a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
										<p class="attribution"><a href="#">Judi Mcginnis</a> at 5:25am, 30th Octmber 2013</p>
										<p>Knowledge speaks, but wisdom listens.</p>
									</div>
								</div>
							</div>
							<div class="act-time">
								<div class="activity-body act-in">
									<span class="arrow"></span>
									<div class="text">
										<a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
										<p class="attribution"><a href="#">Jewell Clark</a> at 5:25am, 30th Octmber 2013</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
									</div>
								</div>
							</div>
							<div class="act-time">
								<div class="activity-body act-in">
									<span class="arrow"></span>
									<div class="text">
										<a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
										<p class="attribution"><a href="#">Lorena Rose</a> at 5:25am, 30th Octmber 2013</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
									</div>
								</div>
							</div>
							<div class="act-time">
								<div class="activity-body act-in">
									<span class="arrow"></span>
									<div class="text">
										<a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
										<p class="attribution"><a href="#">Brandy Childress</a> at 5:25am, 30th Octmber 2013</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
									</div>
								</div>
							</div>
							<div class="act-time">
								<div class="activity-body act-in">
									<span class="arrow"></span>
									<div class="text">
										<a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
										<p class="attribution"><a href="#">Judi Mcginnis</a> at 5:25am, 30th Octmber 2013</p>
										<p>Knowledge speaks, but wisdom listens.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- profile -->
					<div id="tabungan" class="tab-pane active">
						<section class="panel">
							<hr/>
							<a href="#" class="btn btn-success">Print</a>
							<a href="#" class="btn btn-info">Export To PDF</a>
							<hr/>
							<table class="table table-striped">
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>Tranksaksi</th>
									<th>Debit</th>
									<th>Kredit</th>
									<th>Saldo</th>
								</tr>
								<?php
								$data = DB::table('tabungan')
								->join('nasabah', 'nasabah.id', '=', 'tabungan.nasabah_id')
								->select('nasabah.id','tabungan.created_at as tanggal', 'tabungan.debit', 'tabungan.kredit', 'tabungan.saldo_sementara as saldo')
								->where('nasabah.id', '=', $nasabah->id )
								->orderBy('tabungan.created_at', 'ASC');
								$hasil = $data->get();
								$jumlah = $data->count();
								$tabungan = $data->paginate(100);
								$no = 1;
								?>
								@foreach($tabungan as $buku)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{ $buku->tanggal }}</td>
									<td>Menabung Sampah</td>
									<td>
										<?php if ($buku->debit == NULL || $buku->debit == 0): ?>
											{{ '-'; }}
										<?php else: ?>
											{{ format_rupiah($buku->debit) }}
										<?php endif; ?>
									</td>
									<td>
										<?php if ($buku->kredit == NULL || $buku->kredit == 0): ?>
											{{ '-'; }}
										<?php else: ?>
											{{ format_rupiah($buku->kredit) }}
										<?php endif; ?>
									</td>
									<td>
										{{ format_rupiah($buku->saldo) }}
									</td>
								</tr>
								@endforeach
							</table>
							{{ $tabungan->links() }}
							<!--{{ Datatable::table()
							->addColumn('Tanggal','Tranksaksi', 'Debit', 'Kredit', 'Saldo')
							->setUrl(route('api.tabungan'))
							->setOptions('aaSorting', array(
							array(00, 'ASC')
							))
							->setClass('table table-stripped')
							->render()
						}}-->
					</section>
					<section>
						<div class="row">
						</div>
					</section>
				</div>
				<!-- edit-profile -->
				<div id="edit-profile" class="tab-pane">
					<section class="panel">
						<div class="panel-body bio-graph-info">
							<h1>Profile Info</h1>
							<form role="form" method="get" action="{{ action('NasabahController@postEditNasabah') }}">
								<input type="hidden" name="id" value="{{ $nasabah->id}} ">
								<div class="form-group">
									<label for="sampah">Nama Nasabah</label>
									<input type="text" value="{{ $nasabah->nama }}" class="form-control" name="nama" placeholder="Masukan Nama Nasabah">
								</div>
								<div class="form-group">
									<label for="harga">Tempat Lahir</label>
									<input type="text" value="{{ $nasabah->tempat_lahir }}" class="form-control" name="tempat_lahir" placeholder="Contoh: Garut, Bandung dll.">
								</div>
								<div class="form-group">
									<label for="harga">Tanggal Lahir</label>
									<input type="date" value="{{ $nasabah->tanggal_lahir }}" class="form-control" name="tanggal_lahir">
								</div>
								<div class="form-group">
									<label for="harga">Alamat</label><br/>
									<textarea name="alamat" rows="4" cols="40">{{ $nasabah->alamat }}</textarea>
								</div>
								<div class="form-group">
									<label for="harga">No. Telephone</label>
									<input type="text" value="{{ $nasabah->no_telp }}" class="form-control" name="no_telp" placeholder="08111111111">
								</div>
								<button type="submit" class="btn btn-success">Submit</button>
							</form>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
</div>
</div>

<!-- page end-->
</div>
</div>

<div class="modal fade" id="depositSampah" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Deposit Sampah <input type="button" class="btn btn-success btn-xs" name="add_btn" value="Tambah Baris" id="add_btn"></h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="{{ action('NasabahController@debit') }}">
					<input type="hidden" name="id" value="{{ $nasabah->id }}">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Sampah</th>
								<th>Berat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="isi">
							<tr>
								<td>1</td>
								<td>
									<div class="form-group">
										<select name="sampah_1" class="form-control" required>
											<option name="sampah_1"  value="all">-- Pilih Sampah --</option>
											@foreach ($sampah as $data)
											<option value="{{ $data->id }}">{{ $data->nama }}</option>
											@endforeach
										</select>
									</div>
								</td>
								<td style="width: 30%">
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" type="number" name="qty_1" value="" placeholder="Ex. 0.4, 0.5, 1.5" required>
											<div class="input-group-addon"> kg</div>
										</div>
									</div>
								</td>
								<td><a class="remove_item btn btn-danger btn-md disabled" href="#" >Delete</a></td>
								<input id="rows_1" name="rows[]" value="1" type="hidden"></td></tr>
							</tr>
						</tbody>
					</table>
					<hr>
					<button type="submit" class="btn btn-success">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="kredit" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Kredit</h4>
			</div>
			@if($data->saldo =! 0)
			<div class="modal-body">
				<form role="form" method="POST" action="{{ action('NasabahController@kredit') }}">
					<input type="hidden" name="id" value="{{ $nasabah->id }}">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Rp. </div>
							<input type="number" value="{{ $nasabah->nama }}" class="form-control" name="kredit" placeholder="Masukan Nominal">
						</div>
					</div>
					<hr>
					<button type="submit" class="btn btn-success">Simpan</button>
				</form>
			</div>
			@else
			<div class="modal-body">
				<p>
					Nasabah ini tidak dapat mengkredit karena saldo masih kosong.
				</p>
			</div>
			@endif
		</div>
	</div>
</div>

<div class="modal fade" id="debit2" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Debit</h4>
			</div>
			@if($data->saldo =! 0)
			<div class="modal-body">
				<form role="form" method="POST" action="{{ action('NasabahController@debit') }}">
					<input type="hidden" name="id" value="{{ $nasabah->id }}">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Rp. </div>
							<input type="number" value="{{ $nasabah->nama }}" class="form-control" name="debit" placeholder="Masukan Nominal">
						</div>
					</div>
					<hr>
					<button type="submit" class="btn btn-success">Simpan</button>
				</form>
			</div>
			@else
			<div class="modal-body">
				<p>
					Nasabah ini tidak dapat mengkredit karena saldo masih kosong.
				</p>
			</div>
			@endif
		</div>
	</div>
</div>

@stop
