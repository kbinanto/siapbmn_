<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sp2d53_tmp extends Model
{
    protected $table = "sp2d53_tmp";

    protected $fillable = ['id', 'kode_satker', '6digit_kodesatker', 'nama_satker', 'akun', 'no_dokumen', 'tgl_dokumen', 'rph_saiba', 'rph_simak', 'rph_selisih', 'penjelasan'];
}