<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHPembelajaranPeriodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_pembelajaran_periode', function (Blueprint $table) {
          $table->bigIncrements('id_pembelajaran_periode');
            $table->string('kode_pembelajaran_periode',5);
            $table->integer('id_minggu')->unsigned();
            $table->integer('hari_ke')->unsigned();
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_pembelajaran_periode');
    }
}
