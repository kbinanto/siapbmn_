<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset_belum_register_tmp extends Model
{
    protected $table = "aset_belum_register_tmp";

    protected $fillable = ['id', 'kode_satker', '6digit_kodesatker', 'nama_satker', 'akun', 'nama_akun', 'rupiah', 'penjelasan'];
}