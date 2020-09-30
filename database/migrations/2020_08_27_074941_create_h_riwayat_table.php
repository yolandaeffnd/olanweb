<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHRiwayatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_riwayat', function (Blueprint $table) {
            $table->bigIncrements('id_riwayat');
            $table->bigInteger('id_halaqah')->unsigned()->nullable();
            $table->bigInteger('bulan')->unsigned()->nullable();
            $table->bigInteger('id_santri')->unsigned()->nullable();
            $table->Integer('total_juz')->unsigned()->nullable();
            $table->string('surat_selesai')->nullable();
            $table->Integer('total_pertemuan')->unsigned()->nullable();
            $table->Integer('total_hadir')->unsigned()->nullable();
            $table->Integer('total_alfa')->unsigned()->nullable();
            $table->Integer('total_sakit')->unsigned()->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->string('status_keaktifan')->nullable();
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
        Schema::dropIfExists('h_riwayat');
    }
}
