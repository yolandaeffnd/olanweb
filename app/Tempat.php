<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    protected $table = 'tempat';
	   protected $primaryKey='id_tempat';
	   protected $fillable = ['kode_tempat','gedung','ruangan','tingkat'];


	   public function halaqah()
{
	return $this->hasMany(Halaqah::class);
}

}
