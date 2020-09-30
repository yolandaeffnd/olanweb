<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_beasiswa', function (Blueprint $table) {
            $table->bigIncrements('id_penerima_beasiswa');
              $table->unsignedBiginteger('id_santri')->unsigned();
             $table->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('jumlah_pembayaran_spp')->unsigned();
            $table->integer('bulan_berlaku')->unsigned();
            $table->integer('id_periode')->unsigned();

            $table->enum('status_beasiswa',['aktif','tidak_aktif']);

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
        Schema::dropIfExists('h_beasiswa');
    }
}
