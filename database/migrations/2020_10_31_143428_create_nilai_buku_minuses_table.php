<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiBukuMinusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_buku_minus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sap');
            $table->string('kode_satker');
            $table->string('nama_satker');
            $table->bigInteger('kode_barang');
            $table->string('nama_barang');
            $table->bigInteger('nomor_aset');
            $table->bigInteger('rph_aset');
            $table->bigInteger('rph_susut');
            $table->bigInteger('rph_buku');
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
        Schema::dropIfExists('nilai_buku_minus');
    }
}
