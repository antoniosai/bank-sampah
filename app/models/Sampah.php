<?php 

class Sampah extends Eloquent {
	protected $table = 'sampah';

	public function nasabah(){
		return $this->belongsToMany('Nasabah')->withPivot('qty, price')->withTimestamps();
	}
}