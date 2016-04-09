<?php 

class Nasabah extends Eloquent {
	protected $table = 'nasabah';

	public function sampah(){
		return $this->belongsToMany('Sampah')->withPivot('qty, price')->withTimestamps();
	}

}