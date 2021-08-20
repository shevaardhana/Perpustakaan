<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_siswa');
            $table->string('nama');
            $table->string('email');
            $table->string('no_tlp');
            $table->longText('alamat');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_pengembalian');
            $table->integer('lama_pinjam');
            $table->integer('users_id'); //nama penjaga
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
        Schema::dropIfExists('transaction_headers');
    }
}
