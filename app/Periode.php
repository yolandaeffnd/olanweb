<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'h_bulan_periode';
	   protected $primaryKey='id_bulan_periode';
	     protected $guarded=[];
}

