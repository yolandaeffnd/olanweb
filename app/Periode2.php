<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode2 extends Model
{
    protected $table = 'h_periode';
	   protected $primaryKey='id_periode';
	   protected $fillable = ['kode_periode','semester','tahun_akademik','tahun','tgl_mulai','aktif'];


public function registrasi()
{
	return $this->hasMany(Registrasi::class);
}


public function halaqah()
{
	return $this->hasMany(Halaqah::class);
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
