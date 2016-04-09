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
				Aktif Sejak : <span><i class="icon_clock_alt"></i> <strong>{{Sentry::getUser()->created_at }}</strong></span><br/>
				Login Terahkir : <span><i class="icon_calendar"></i> <strong>{{ Sentry::getUser()->last_login }}</strong></span>
				<span><i class="icon_pin_alt"></i>NY</span>


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
						<h1>22</h1>
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
						<h1>140</h1>
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

<h2>Hasil Penjualan</h2>
<hr/>
<canvas id="buyers" width="600" height="400"></canvas>





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
