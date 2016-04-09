<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nasabah extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nasabah', function($table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('tempat_lahir');
			$table->string('tanggal_lahir');
			$table->string('alamat');
			$table->string('no_telp');
			$table->timestamps();
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nasabah');
	}

}
