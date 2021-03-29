<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Referensi_wilayah extends Model
{

    protected $table = "referensi_wilayah";

    protected $fillable = ['id', 'baes1', 'wilayah_satker', 'kode_satker', 'nama_satker', 'kode_pembeina'];
}