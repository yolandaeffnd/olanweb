<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'pegawai';
	   protected $primaryKey='id_pegawai';
	    protected $guarded=[];



	    public function halaqah()
{
	return $this->hasMany(Halaqah::class);
}
}
