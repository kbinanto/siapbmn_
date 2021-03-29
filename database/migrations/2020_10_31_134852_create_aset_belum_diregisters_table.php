<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetBelumDiregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_belum_diregister', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_satker');
            $table->string('nama_satker');
            $table->bigInteger('akun');
            $table->string('nama_akun');
            $table->bigInteger('rupiah');
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
        Schema::dropIfExists('aset_belum_diregister');
    }
}
