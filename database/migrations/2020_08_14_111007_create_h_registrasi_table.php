<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_registrasi', function (Blueprint $table) {
            $table->bigIncrements('id_registrasi');
            $table->enum('tipe',['Baru','Lama'])->nullable();

            $table->unsignedBiginteger('id_periode')->unsigned()->nullable();
            $table->foreign('id_periode')->references('id_periode')->on('h_periode')->onDelete('cascade')->onUpdate('cascade');


            $table->date('tgl')->nullable();

            $table->unsignedBiginteger('id_santri')->unsigned()->nullable();
            $table->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBiginteger('id_jadwal')->unsigned()->nullable();
             $table->foreign('id_jadwal')->references('id_jadwal')->on('h_jadwal')->onDelete('cascade')->onUpdate('cascade');



            $table->enum('status',['aktif','tidak aktif'])->nullable();
            $table->enum('status_pembayaran',['bayar','belum_bayar'])->nullable();
            $table->integer('jumlah_pembayaran')->unsigned()->nullable();
            $table->date('tgl_pembayaran')->nullable();
        
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
        Schema::dropIfExists('h_registrasi');
    }
}
