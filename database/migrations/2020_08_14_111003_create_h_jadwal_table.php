<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_jadwal', function (Blueprint $table) {
             $table->bigIncrements('id_jadwal');
            $table->string('kode_jadwal',25)->nullable();
            $table->string('nama_jadwal',25)->nullable();
            $table->unsignedBiginteger('id_hari')->unsigned()->nullable();     
            $table->unsignedBiginteger('id_shift')->unsigned()->nullable();   


             $table->foreign('id_hari')->references('id_hari')->on('h_hari')->onDelete('cascade')->onUpdate('cascade');


              $table->foreign('id_shift')->references('id_shift')->on('shift')->onDelete('cascade')->onUpdate('cascade');



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
        Schema::dropIfExists('h_jadwal');
    }
}
