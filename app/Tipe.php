<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $table = 'r_tipe';
	   protected $primaryKey='id_tipe';
	   protected $fillable = ['kode_tipe','nama_tipe'];
}
