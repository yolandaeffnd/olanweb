<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'h_beasiswa';
	   protected $primaryKey='id_penerima_beasiswa';
	   protected $fillable = ['id_santri','jumlah_pembayaran_spp','bulan_berlaku','id_periode','status_beasiswa'];


	    public function periode2(){
    	return $this->belongsTo('App\Periode2','id_periode');
    }

     public function santri(){
    	return $this->belongsTo('App\Santri','id_santri');
    }

}
