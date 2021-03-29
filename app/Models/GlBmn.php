<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlBmn extends Model
{
    protected $table = "glbmn";

    protected $fillable = ['kode_satker', '6digit_kodesatker', 'nama_satker', 'akun', 'uraian', 'rph_saiba', 'rph_intra', 'rph_kdp', 'rph_ekstra', 'rph_selisih', 'penjelasan'];
}
