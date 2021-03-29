<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tktm_persediaan extends Model
{
    protected $table = "tktm_persediaan";

    protected $fillable = ['kode_satker_pengirim', '6digit_kodesatkerpengirim', 'nama_satker_pengirim', 'kode_barang_pengirim', 'uraian_barang_pengirim', 'kuantitas_pengirim', 'rp_transferkeluar', 'kode_satker_penerima', '6digit_kodesatkerpenerima', 'nama_satker_penerima', 'kuantitas_penerima', 'rp_transfermasuk', 'selisih_kuantitas', 'selisih_rp', 'penjelasan'];
}