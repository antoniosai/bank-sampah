<?php

class Nasabah extends Eloquent {
	protected $table = 'nasabah';


	public function sampah(){
		return $this->belongsToMany('Sampah')->withPivot('qty, price')->withTimestamps();
	}

	public function simpan($id, $qty){
		$sampah = Sampah::find($id);
		$this->sampah()->attach($id, ['qty' => $qty, 'price' => $qty * $sampah->harga]);

		return Redirect::back()->with('successMessage', 'Sampah $sampah->nama berhasil ditambah');
	}

	public function tabungan(){
		return $this->hasMany('Tabungans');
	}

}
