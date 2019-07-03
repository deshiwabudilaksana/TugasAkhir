<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_kado');
            $table->string('url');
            $table->timestamps();


            $table->foreign('id_kado')->references('id')->on('kados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_barangs');
    }
}
