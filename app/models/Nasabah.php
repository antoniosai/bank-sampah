<?php

class Nasabah extends BaseModel {
	protected $table = 'nasabah';

	public static $rulesNasabah = [
		'nama'	=> 'required|unique:nama, nama, :id',
		'tempat_lahir' => 'required',
		'tanggal_lahir' => 'date',
		'alamat' => 'required',
		'no_telp' => 'required|number'
	];

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

	public function saldo(){
		return $this->hasOne('Saldo');
	}

	public function debit($debit){
		$saldo = $this->saldo - $debit;
		$saldo->save();
	}

	public function kredit($kredit){
		$saldo = $this->saldo - $kredit;
		$saldo->save();
	}

}
