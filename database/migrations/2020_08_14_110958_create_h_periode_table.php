<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHPeriodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_periode', function (Blueprint $table) {
            $table->bigIncrements('id_periode');
            $table->string('kode_periode',25)->nullable();
            $table->string('semester')->nullable();
            $table->string('tahun_akademik')->nullable();
            $table->year('tahun')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->enum('status',['Aktif','Tidak aktif'])->nullable();
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
        Schema::dropIfExists('h_periode');
    }
}
