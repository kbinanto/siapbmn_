<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tktm_tmp extends Model
{
    protected $table = "tktm_tmp";

    protected $fillable = ['id', 'kode_satker_pengirim', '6digit_kodesatkerpengirim', 'nama_satker_pengirim', 'kode_akun_pengirim', 'uraian_akun_pengirim', 'transfer_keluar', 'rp_transferkeluar', 'kode_satker_penerima', '6digit_kodesatkerpenerima', 'nama_satker_penerima', 'transfer_masuk', 'selisih', 'penjelasan'];
}