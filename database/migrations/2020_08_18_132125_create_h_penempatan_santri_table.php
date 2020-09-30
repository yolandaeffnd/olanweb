<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHPenempatanSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_penempatan_santri', function (Blueprint $table) {
          $table->bigIncrements('id_penempatan_santri');
            $table->unsignedBiginteger('id_periode')->unsigned()->nullable();

    $table->foreign('id_periode')->references('id_periode')->on('h_periode')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBiginteger('id_jadwal')->unsigned()->nullable();
$table->foreign('id_jadwal')->references('id_jadwal')->on('h_jadwal')->onDelete('cascade')->onUpdate('cascade');


             $table->unsignedBiginteger('id_santri')->unsigned()->nullable();
             $table->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBiginteger('id_halaqah')->unsigned()->nullable()->nullable();
               $table->foreign('id_halaqah')->references('id_halaqah')->on('h_halaqah')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBiginteger('id_pembelajaran_periode')->unsigned()->nullable();

         $table->foreign('id_pembelajaran_periode')->references('id_pembelajaran_periode')->on('h_pembelajaran_periode')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('status',['menunggu','ditempatkan','terlaksana'])->nullable();
            $table->date('tgl_regis')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->enum('status_registrasi',['Baru','Lama'])->nullable();
            
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
        Schema::dropIfExists('h_penempatan_santri');
    }
}
