<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HalaqahSantri extends Model
{
    protected $table = 'h_halaqah_santri';
	   protected $primaryKey='id_halaqah_santri';
	   protected $fillable = ['id_santri','id_halaqah'];

	    public function santri(){
    	return $this->belongsTo('App\Santri','id_santri');
    }

 public function halaqah(){
    	return $this->belongsTo('App\Halaqah','id_halaqah');
    }


}
