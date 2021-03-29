<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reklasifikasi_aset_tmp extends Model
{
    protected $table = "reklasifikasi_aset_tmp";

    protected $fillable = ['id', 'kode_satker', '6digit_kodesatker', 'nama_satker', 'reklas_masuk', 'reklas_keluar', 'selisih', 'penjelasan'];
}