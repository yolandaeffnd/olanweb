<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'h_registrasi';
	   protected $primaryKey='id_registrasi';
	   protected $fillable = ['tipe','id_periode','tgl','id_santri','id_jadwal','status','status_pembayaran','jumlah_pembayaran','tgl_pembayaran'];


	   public function periode2(){
    	return $this->belongsTo('App\Periode2','id_periode');
    }

     public function santri(){
    	return $this->belongsTo('App\Santri','id_santri');
    }


    public function jadwal(){
    	return $this->belongsTo('App\Jadwal','id_jadwal');
    }

    

}
