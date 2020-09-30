<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_pembelajaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembelajaran');
            $table->unsignedbigInteger('id_pertemuan')->unsigned();
             $table->foreign('id_pertemuan')->references('id_pertemuan')->on('pertemuan')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedbigInteger('id_pegawai')->unsigned();
             $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedbigInteger('id_santri')->unsigned();
             $table->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');

              $table->date('tgl');
            $table->enum('kehadiran',['hadir','sakit','alfa']);
            $table->bigInteger('id_juz_mulai')->unsigned()->nullable();
            $table->string('surat_mulai')->nullable();
            $table->Integer('ayat_mulai')->unsigned()->nullable();
            $table->bigInteger('id_juz_selesai')->unsigned()->nullable();
            $table->string('surat_selesai')->nullable();
            $table->Integer('ayat_selesai')->unsigned()->nullable();
            $table->Integer('total_juz')->unsigned()->nullable();
            $table->string('cttn')->nullable();
            
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
        Schema::dropIfExists('h_pembelajaran');
    }
}
