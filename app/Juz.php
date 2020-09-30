<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juz extends Model
{
     protected $table = 'juz';
	   protected $primaryKey='id_juz';
  		 protected $fillable = ['nama_juz','id_suratmulai','no_ayatmulai','id_suratselesai','no_ayatselesai'];
}


 