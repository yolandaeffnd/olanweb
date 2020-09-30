<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
   protected $table = 'santri';
   protected $primaryKey='id_santri';
    protected $guarded=[];
public function registrasi()
{
	return $this->hasMany(Registrasi::class);
}


public function beasiswa()
{
	return $this->hasMany(Beasiswa::class);
}


public function pembayaran()
{
	return $this->hasMany(Pembayaran::class);
}


}
