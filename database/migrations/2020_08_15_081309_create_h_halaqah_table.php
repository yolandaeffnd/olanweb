<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHHalaqahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_halaqah', function (Blueprint $table) {
            $table->bigIncrements('id_halaqah');
            $table->string('kode_halaqah',30)->nullable();
            $table->enum('jeniskelas',['HR','HP'])->nullable();
            
            $table->unsignedBiginteger('id_pegawai')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');

           
            $table->unsignedBiginteger('id_periode')->unsigned()->nullable();
               $table->foreign('id_periode')->references('id_periode')->on('h_periode')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBiginteger('id_tempat')->unsigned()->nullable();
            $table->foreign('id_tempat')->references('id_tempat')->on('tempat')->onDelete('cascade')->onUpdate('cascade');
           


            $table->unsignedBiginteger('id_jadwal')->unsigned()->nullable();
               $table->foreign('id_jadwal')->references('id_jadwal')->on('h_jadwal')->onDelete('cascade')->onUpdate('cascade');


         
            $table->enum('jk',['laki-laki','perempuan'])->nullable();
            
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
        Schema::dropIfExists('h_halaqah');
    }
}
