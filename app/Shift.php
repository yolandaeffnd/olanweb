<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
     protected $table = 'shift';
	   protected $primaryKey='id_shift';
	   protected $guarded=[];

	   public function jadwal()
{
	return $this->hasMany(Jadwal::class);
}
}

