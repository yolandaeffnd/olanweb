<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHHalaqahSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_halaqah_santri', function (Blueprint $table) {
            $table->bigIncrements('id_halaqah_santri');
            $table->unsignedBiginteger('id_santri')->unsigned()->nullable();
             $table->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');

          
            $table->unsignedBiginteger('id_halaqah')->unsigned()->nullable();

               $table->foreign('id_halaqah')->references('id_halaqah')->on('h_halaqah')->onDelete('cascade')->onUpdate('cascade');

              


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
        Schema::dropIfExists('h_halaqah_santri');
    }
}
