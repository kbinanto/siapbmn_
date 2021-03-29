<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTktmPersediaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tktm_persediaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_satker_pengirim');
            $table->string('nama_satker_pengirim');
            $table->bigInteger('kode_barang_pengirim');
            $table->string('uraian_barang_pengirim');
            $table->bigInteger('kuantitas_pengirim');
            $table->bigInteger('rp_transferkeluar');

            $table->string('kode_satker_penerima');
            $table->string('nama_satker_penerima');
            $table->bigInteger('kuantitas_penerima');
            $table->bigInteger('rp_transfermasuk');

            $table->bigInteger('selisih_kuantitas');
            $table->bigInteger('selisih_rp');

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
        Schema::dropIfExists('tktm_persediaan');
    }
}
