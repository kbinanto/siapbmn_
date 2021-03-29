<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTktmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tktm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_satker_pengirim');
            $table->string('nama_satker_pengirim');
            $table->bigInteger('kode_akun_pengirim');
            $table->string('uraian_akun_pengirim');
            $table->bigInteger('transfer_keluar');

            $table->string('kode_satker_penerima');
            $table->string('nama_satker_penerima');
            $table->bigInteger('transfer_masuk');
            $table->bigInteger('selisih');

            $table->text('penjelasan');
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
        Schema::dropIfExists('tktm');
    }
}
