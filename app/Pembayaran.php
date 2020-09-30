<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'h_pembayaran';
	   protected $primaryKey='id_pembayaran';
	   protected $fillable = ['id_santri','id_periode','bulan','tgl_pembayaran','spp','status'];

 public function periode2(){
    	return $this->belongsTo('App\Periode2','id_periode');
    }

     public function santri(){
    	return $this->belongsTo('App\Santri','id_santri');
    }

 

}
