<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSp2d53sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp2d53', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_satker');
            $table->string('nama_satker');
            $table->bigInteger('akun');
            $table->string('no_dokumen');
            $table->text('tgl_dokumen');
            $table->bigInteger('rph_saiba');
            $table->bigInteger('rph_simak');
            $table->bigInteger('rph_selisih');
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
        Schema::dropIfExists('sp2d53');
    }
}
