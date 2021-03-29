<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reklasifikasi_aset extends Model
{
    protected $table = "reklasifikasi_aset";

    protected $fillable = ['kode_satker', '6digit_kodesatker', 'nama_satker', '6digit_kodesatker',  'reklas_masuk', 'reklas_keluar', 'selisih', 'penjelasan'];
}