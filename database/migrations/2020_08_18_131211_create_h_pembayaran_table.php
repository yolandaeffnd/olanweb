<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->unsignedBiginteger('id_santri')->unsigned()->nullable();
             $table->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBiginteger('id_periode')->unsigned()->nullable();
            $table->foreign('id_periode')->references('id_periode')->on('h_periode')->onDelete('cascade')->onUpdate('cascade');

            $table->Integer('bulan')->unsigned()->nullable();
            $table->date('tgl_pembayaran')->nullable();
            $table->double('spp')->nullable();
            $table->enum('status',['lunas','belum_lunas'])->nullable();
            
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
        Schema::dropIfExists('h_pembayaran');
    }
}
