<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
      protected $table = 'h_riwayat';
	   protected $primaryKey='id_riwayat';
	     protected $guarded=[];


	public function santri(){
    	return $this->belongsTo('App\Santri','id_santri');
    }

    public function pertemuan(){
    	return $this->belongsTo('App\Santri','id_pertemuan');
    }

    public function halaqah(){
    	return $this->belongsTo('App\Halaqah','id_halaqah');
    }


}
