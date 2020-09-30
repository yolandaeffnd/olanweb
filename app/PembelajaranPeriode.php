<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelajaranPeriode extends Model
{
     protected $table = 'h_pembelajaran_periode';
	   protected $primaryKey='id_pembelajaran_periode';
	   protected $fillable = ['kode_pembelajaran_periode','id_minggu','hari_ke'];


	   public function penempatan()
{
	return $this->hasMany(Penempatan::class);
}
}
