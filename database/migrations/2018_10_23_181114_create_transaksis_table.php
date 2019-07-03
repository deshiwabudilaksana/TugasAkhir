<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTimeTz('tanggal_transaksi');
            $table->dateTimeTz('batas_transaksi');
            $table->string('alamat_pengiriman');
            $table->double('total_belanja',12,2);
            $table->double('total_ongkos_kirim',12,2);
            $table->double('total_transaksi',12,2);
            $table->unsignedBigInteger('id_user');
            $table->unsignedInteger('id_kurir');



           
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_kurir')->references('id')->on('kurir_pengirimans');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
