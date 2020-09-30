<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
     protected $table = 'pertemuan';
	   protected $primaryKey='id_pertemuan';
	     protected $guarded=[];





    public function halaqah(){
    	return $this->belongsTo('App\Halaqah','id_halaqah');
    }

	public function pembelajaranperiode(){
        return $this->belongsTo('App\PembelajaranPeriode','id_pembelajaran_periode');
    }    



}

