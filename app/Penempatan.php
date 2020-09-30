<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
     protected $table = 'h_penempatan_santri';
	   protected $primaryKey='id_penempatan_santri';
	   protected $fillable = ['id_periode','id_jadwal','id_santri','id_halaqah','id_pembelajaran_periode','status','tgl_regis','tgl_mulai','status_registrasi'];

	     public function periode2(){
    	return $this->belongsTo('App\Periode2','id_periode');
    }

     public function santri(){
    	return $this->belongsTo('App\Santri','id_santri');
    }


    public function jadwal(){
    	return $this->belongsTo('App\Jadwal','id_jadwal');
    }

    public function halaqah(){
    	return $this->belongsTo('App\Halaqah','id_halaqah');
    }

public function pembelajaranperiode(){
        return $this->belongsTo('App\PembelajaranPeriode','id_pembelajaran_periode');
    }    


    public function registrasi()
{
    return $this->hasMany(Registrasi::class);
}


}
