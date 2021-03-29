<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggal_buku_minus_tmp extends Model
{
    protected $table = "tanggal_buku_minus_tmp";

    protected $fillable = ['id', 'kode_satker', '6digit_kodesatker', 'nama_satker', 'kode_barang', 'nomor_aset', 'tgl_buku', 'tgl_perolehan', 'penjelasan'];
}