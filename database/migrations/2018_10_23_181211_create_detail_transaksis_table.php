<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_kado');
            $table->integer('jumlah_brg');
            $table->timestamps();
            $table->unsignedInteger('id_seller');

            $table->foreign('id_seller')->references('id')->on('sellers');
            $table->foreign('id_transaksi')->references('id')->on('transaksis');
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
        Schema::dropIfExists('detail_transaksis');
    }
}
