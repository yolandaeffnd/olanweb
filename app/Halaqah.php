<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Halaqah extends Model
{
    protected $table = 'h_halaqah';
	   protected $primaryKey='id_halaqah';
	   protected $fillable = ['kode_halaqah','jeniskelas','id_pegawai','id_tempat','id_periode','id_jadwal','jk'];


	    public function guru(){
    	return $this->belongsTo('App\Guru','id_pegawai');
    }

     public function tempat(){
    	return $this->belongsTo('App\Tempat','id_tempat');
    }

      public function periode2(){
    	return $this->belongsTo('App\Periode2','id_periode');
    }

     public function jadwal(){
    	return $this->belongsTo('App\Jadwal','id_jadwal');
    }


    public function registrasi()
{
	return $this->hasMany(Registrasi::class);
}

public function halaqahsantri()
{
  return $this->hasMany(HalaqahSantri::class);
}

public function penempatan()
{
  return $this->hasMany(Penempatan::class);
}


}
