@extends('backend.templates.layout')

@section('title')
sda
@stop

@section('header')
Dashboard
@stop

@section('content')
<!--overview start-->
<div class="row state-overview">

	<!--user profile info start-->
	<section class="panel">
		<div class="profile-widget profile-widget-info">
			<div class="panel-body">
				<?php
				$user = Sentry::getUser();

				$admin = Sentry::findGroupByName('administrator');
				$status = "Teller";
				if($user->inGroup($admin)){
					$status = "Admin";
				}

				?>
				<h2>Selamat Datang, <strong>{{Sentry::getUser()->first_name}}</strong></h2>
				Status : <strong>{{ $status }}</strong><br/>
				Aktif Sejak : <span><i class="icon_clock_alt"></i> <strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime(Sentry::getUser()->created_at))->diffForHumans() }}</strong></span><br/>
				Login Terahkir : <span><i class="icon_calendar"></i> <strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime(Sentry::getUser()->last_login))->diffForHumans() }}</strong></span>
			</div>
		</div>
	</section>
	<!--user profile info end-->
	<!-- statics start -->
	<div class="state col-lg-12">
		<div class="row">
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol">
						<i class="icon_folder"></i>
					</div>
					<div class="value">
						<?php $dataNasabah = Nasabah::all()->count() ?>
						<h1>{{ $dataNasabah}}</h1>
						<p>Nasabah</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol">
						<i class="icon_genius"></i>
					</div>
					<div class="value">
						<?php $dataSampah = Sampah::all()->count() ?>
						<h1>{{ $dataSampah }}</h1>
						<p>Jenis Sampah</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol">
						<i class="icon_cart_alt"></i>
					</div>
					<div class="value">
						<h1>345</h1>
						<p>New Order</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol">
						<i class="icon_currency"></i>
					</div>
					<div class="value">
						<h1>Rp. 5,500</h1>
						<p>Donasi Terkumpul</p>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- statics end -->
</div>
<!--overview end-->


<div class="row">
	<div class="col-md-6">
		<h2>Hasil Penjualan</h2>
		<hr/>
		<canvas id="buyers" width="530" height="250"></canvas>
	</div>
	<div class="col-md-1">

	</div>
	<div class="col-md-4">
		<?php $data = DB::table('nasabah')
		->join('nasabah_sampah', 'nasabah_sampah.nasabah_id', '=', 'nasabah.id')
		->join('sampah', 'nasabah_sampah.sampah_id', '=', 'sampah.id')
		->select('nasabah.nama as nasabah', 'sampah.nama as sampah', 'nasabah_sampah.qty as banyak', 'nasabah_sampah.created_at')
		->orderBy('nasabah_sampah.created_at', 'DESC')->limit(3);
		$nasabah = $data->get();
		?>
		<h2>Aktivitas Nasabah</h2>
		<section class="panel">
			<div class="panel-body">
				<div class="tab-content">
					<div id="recent-activity" class="tab-pane active">
						<div class="profile-activity">
							@foreach ($nasabah as $user)
							<div class="act-time">
								<div class="activity-body act-in">
									<span class="arrow"></span>
									<div class="text">
										<a href="#"><strong>{{ $user->nasabah }}</strong></a><br>
										<p>menabung {{ $user->sampah }} sebanyak {{ $user->banyak }} kg<br/><i>{{\Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}</i></p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<script>
var barData = {
	labels : ["January","February","March","April","May","June"],
	datasets : [
		{
			fillColor : "#48A497",
			strokeColor : "#48A4D1",
			data : [456,479,324,569,702,600]
		},
		{
			fillColor : "rgba(73,188,170,0.4)",
			strokeColor : "rgba(72,174,209,0.4)",
			data : [364,504,605,400,345,320]
		}

	]
}
var buyers = document.getElementById('buyers').getContext('2d');
new Chart(buyers).Bar(barData);
</script>
@stop
