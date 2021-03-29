<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo_tidak_normal_tmp extends Model
{
    protected $table = "saldo_tidak_normal_tmp";

    protected $fillable = ['id', 'kode_satker', '6digit_kodesatker', 'nama_satker', 'trn', 'akun', 'uraian_akun', 'debet', 'kredit', 'saldo_normal', 'keterangan', 'penjelasan'];
}