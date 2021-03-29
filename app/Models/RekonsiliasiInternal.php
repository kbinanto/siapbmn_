<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RekonsiliasiInternal extends Model
{

    protected $table = "rekonsiliasi_internal";

    protected $fillable = ['kode_satker', '6digit_kodesatker', 'nama_satker', 'akun', 'uraian', 'rph_saiba', 'rph_simak', 'rph_selisih', 'penjelasan'];
}
