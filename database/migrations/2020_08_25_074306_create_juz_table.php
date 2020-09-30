<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juz', function (Blueprint $table) {
           $table->bigIncrements('id_juz');
            $table->string('nama_juz',100);
            $table->unsignedBiginteger('id_suratmulai')->unsigned();
            $table->integer('no_ayatmulai')->unsigned();
            $table->unsignedBiginteger('id_suratselesai')->unsigned();
            $table->integer('no_ayatselesai')->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juz');
    }
}
