<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_header', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_induk_siswa');
            $table->string('nama');
            $table->string('email');
            $table->string('no_tlp');
            $table->longText('alamat');
            $table->date('tanggal'); //tgl pelayanan
            $table->integer('lama_pinjam');
            $table->integer('user_id'); //nama penjaga
            $table->string('status');
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
        Schema::dropIfExists('transaksi_header');
    }
}
