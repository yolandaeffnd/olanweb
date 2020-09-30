<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'h_jadwal';
	   protected $primaryKey='id_jadwal';
	   protected $fillable = ['kode_jadwal','nama_jadwal','id_hari','id_shift'];


	    public function hari(){
    	return $this->belongsTo('App\Hari','id_hari');
    }

     public function shift(){
    	return $this->belongsTo('App\Shift','id_shift');
    }


    public function registrasi()
{
	return $this->hasMany(Registrasi::class);
}

public function halaqah()
{
    return $this->hasMany(Halaqah::class);
}

}
