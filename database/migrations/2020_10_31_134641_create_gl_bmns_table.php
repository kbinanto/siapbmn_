<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlBmnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gl_bmn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_satker');
            $table->string('nama_satker');
            $table->bigInteger('akun');
            $table->string('uraian');
            $table->bigInteger('rph_saiba');
            $table->bigInteger('rph_intra');
            $table->bigInteger('rph_kdp');
            $table->bigInteger('rph_ekstra');
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
        Schema::dropIfExists('gl_bmn');
    }
}
