<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggalBukuMinusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggal_buku_minus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_satker');
            $table->string('nama_satker');
            $table->bigInteger('kode_barang');
            $table->bigInteger('nomor_aset');
            $table->text('tgl_buku');
            $table->text('tgl_perolehan');
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
        Schema::dropIfExists('tanggal_buku_minus');
    }
}
