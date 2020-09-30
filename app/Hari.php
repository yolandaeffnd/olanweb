<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    protected $table = 'h_hari';
	   protected $primaryKey='id_hari';
	   protected $fillable = ['kode_hari','nama_hari'];

 public function jadwal()
{
	return $this->hasMany(Jadwal::class);
}
}

