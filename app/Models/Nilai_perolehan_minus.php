<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_perolehan_minus extends Model
{
    protected $table = "nilai_perolehan_minus";

    protected $fillable = ['sap', 'kode_satker', '6digit_kodesatker',  'nama_satker', 'kode_barang', 'nama_barang', 'nomor_aset', 'rph_aset', 'penjelasan'];
}