<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RekonsiliasiInternal_tmp extends Model
{

    protected $table = "rekonsiliasi_internal_tmp";

    protected $fillable = ['id', 'kode_satker', '6digit_kodesatker', 'nama_satker', 'akun', 'uraian', 'rph_saiba', 'rph_simak', 'rph_selisih', 'penjelasan'];
}