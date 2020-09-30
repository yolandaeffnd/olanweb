<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    protected $table = 'h_pembelajaran';
	   protected $primaryKey='id_pembelajaran';
	     protected $guarded=[];




	public function pertemuan(){
    	return $this->belongsTo('App\Pertemuan','id_pertemuan');
    }

	public function guru(){
    	return $this->belongsTo('App\Guru','id_pegawai');
    }

     public function santri(){
    	return $this->belongsTo('App\Santri','id_santri');
    }

     public function juz(){
    	return $this->belongsTo('App\Juz','id_juz');
    }

     public function surat(){
    	return $this->belongsTo('App\Santri','id_surat');
    }

  




	     
}



