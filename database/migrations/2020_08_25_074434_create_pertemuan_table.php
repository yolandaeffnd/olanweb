<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertemuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertemuan', function (Blueprint $table) {
           $table->bigIncrements('id_pertemuan');

            $table->unsignedBiginteger('id_halaqah')->unsigned()->nullable();
              $table->foreign('id_halaqah')->references('id_halaqah')->on('h_halaqah')->onDelete('cascade')->onUpdate('cascade');

            $table->date('tgl')->nullable();

            $table->unsignedBiginteger('id_pembelajaran_periode')->unsigned()->nullable();
              $table->foreign('id_pembelajaran_periode')->references('id_pembelajaran_periode')->on('h_pembelajaran_periode')->onDelete('cascade')->onUpdate('cascade');


            $table->Integer('id_pertemuan_kelas')->unsigned()->nullable();
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
        Schema::dropIfExists('pertemuan');
    }
}
