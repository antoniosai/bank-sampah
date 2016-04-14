<?php

class Tabungans extends Eloquent {
	protected $table = 'tabungan';

  public function nasabah(){
    return $this->belongsTo('Nasabah');
  }
}
