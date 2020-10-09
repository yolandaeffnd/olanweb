<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id_pegawai');
            $table->string('nip',50)->nullable();
            $table->string('nama_guru',50);
            $table->string('gambar')->nullable();
            $table->date('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jk', ['Laki-laki','Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('nohp',15)->nullable();
            $table->string('email',25)->nullable();
            $table->text('lulusan')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->integer('jml_hafalan')->unsigned()->nullable();
            $table->string('jabatan',50)->nullable();
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
        Schema::dropIfExists('pegawai');
    }
}
