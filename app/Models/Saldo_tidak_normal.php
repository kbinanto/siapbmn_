<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo_tidak_normal extends Model
{
    protected $table = "saldo_tidak_normal";

    protected $fillable = ['kode_satker', 'nama_satker', '6digit_kodesatker', 'trn', 'akun', 'uraian_akun', 'debet', 'kredit', 'saldo_normal', 'keterangan', 'penjelasan'];
}
