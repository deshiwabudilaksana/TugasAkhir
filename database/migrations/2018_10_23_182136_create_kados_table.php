<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kado',100);
            $table->double('harga_kado',12,2);
            $table->unsignedInteger('id_seller');
            $table->text('deskripsi');
            $table->timestamps();


            $table->foreign('id_seller')->references('id')->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kados');
    }
}
