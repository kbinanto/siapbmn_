<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoTidakNormalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_tidak_normal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_satker');
            $table->string('nama_satker');
            $table->string('trn');
            $table->string('akun');
            $table->string('uraian_akun');
            $table->bigInteger('debet');
            $table->bigInteger('kredit');
            $table->bigInteger('saldo_normal');
            $table->string('keterangan');
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
        Schema::dropIfExists('saldo_tidak_normal');
    }
}
