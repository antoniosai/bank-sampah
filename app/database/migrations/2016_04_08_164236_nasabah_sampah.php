<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NasabahSampah extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nasabah_sampah', function(Blueprint $table){
			$table->increments('id');
			$table->integer('nasabah_id')->unsigned()->index();
			$table->foreign('nasabah_id')->references('id')->on('nasabah')
														   ->onDelete('cascade')
														   ->onUpdate('cascade');

			$table->integer('sampah_id')->unsigned()->index();
			$table->foreign('sampah_id')->references('id')->on('sampah')
														   ->onDelete('cascade')
														   ->onUpdate('cascade');	

			$table->float('qty');
			$table->float('price');
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
		Schema::drop('nasabah_sampah');
	}

}
