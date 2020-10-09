<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
             $table->BigIncrements('id_santri');
            $table->string('nis',11);
            $table->string('gambar')->nullable();
            $table->string('nama_santri',50)->nullable();
            $table->string('panggilan',30)->nullable();
            $table->string('tempat_lahir',50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jk', ['Laki-laki','Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('pendidikan',50)->nullable();
            $table->string('kelas',25)->nullable();
            $table->string('nama_ayah',50)->nullable();
            $table->string('pekerjaan_ayah',50)->nullable();
            $table->string('nama_ibu',50)->nullable();
            $table->string('pekerjaan_ibu',50)->nullable();
            $table->string('no_hp',25)->nullable();
            $table->text('tujuan_masuk')->nullable();
            $table->integer('totjuz')->unsigned()->nullable();
           
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
        Schema::dropIfExists('santri');
    }
}
