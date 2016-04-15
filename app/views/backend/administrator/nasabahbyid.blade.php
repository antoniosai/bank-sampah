@extends('backend.templates.layout')

@section('style_head')
@include('partials.datatable')
@stop

@section('title')
Nasabah
@stop

@section('header')
Data Nasabah
@stop

@section('content')
<div class="profile-widget profile-widget-info">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12 text-left">
				<h3><strong>{{ $nasabah->nama }}</strong></h3>
				<hr/>
				<div class="row">
					<div class="bio-row">
						<p><span>No. Rek </span>:  <strong>1231-123123-12</strong></p>
					</div>
					<div class="bio-row">
						<p><span>Telepon </span>: <strong> {{ $nasabah->no_telp }}</strong></p>
					</div>
					<div class="bio-row">
						<p><span>Tempat Lahir </span>: <strong> {{ $nasabah->tempat_lahir }}</strong></p>
					</div>
					<div class="bio-row">
						<p><span>Country </span>: Los Angeles</p>
					</div>
					<div class="bio-row">
						<p><span>Tanggal Lahir </span>: <strong> {{ $nasabah->tanggal_lahir }}</strong></p>
					</div>
					<div class="bio-row">
						<p><span>Email </span>: johnf@karmanta.com</p>
					</div>
					<div class="bio-row">
						<p><span>Mobile </span>: (08) 564 789</p>
					</div>
					<div class="bio-row">
						<p><span>Phone </span>:  (+91) 90164 18808</p>
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
								<p>
									akjaklsdj
								</p>
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
									->select('tabungan.created_at as tanggal', 'tabungan.debit', 'tabungan.kredit')
									->where('nasabah.id', '=', $nasabah->id )
									->orderBy('tabungan.created_at', 'ASC');
									$tabungan = $data->paginate(2);
									$no = 1;

									function format_rupiah($val){
									  echo "Rp ". $rupiah=number_format($val,0,',','.');
									}
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
										 <?php
										 	$saldo = $buku->debit - $buku->kredit;
											echo format_rupiah($saldo);
										 ?>
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

@stop
