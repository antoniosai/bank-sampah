<?php

/**
 * 
 */
class Saldo extends Eloquent
{
    
    protected $table = 'saldo';
    
    public function createSaldo($idNasabah){
        $query = Temp::select('price')
			 ->where('created_at', '>', date('Y-m-d 00:00:00'))
			 ->where('created_at', '<', date('Y-m-d 23:59:59'))
             ->where('nasabah_id','=', $idNasabah)
			 ->get();
        $total = 0;
        foreach ($query as $data) {
            $total = $total + $data->price;
        }
    }
    
    public function debit($idNasabah, $debit){
                
    }
    
    public function kredit(){
        
    }
    
    public function nasabah(){
        return $this->belongsTo('Nasabah');
    }
}
