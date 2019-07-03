<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKategoriKadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kategori_kados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_kategori');
            $table->unsignedBigInteger('id_kado');
            
            $table->foreign('id_kategori')->references('id')->on('kategori_kados');
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
        Schema::dropIfExists('detail_kategori_kados');
    }
}
