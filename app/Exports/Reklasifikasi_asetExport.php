<?php

namespace App\Exports;

use App\Models\Reklasifikasi_aset;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;





class Reklasifikasi_asetExport implements FromQuery, WithHeadings
{

    public function query()
    {
        return Reklasifikasi_aset::query()->join('referensi_wilayah', 'Reklasifikasi_aset.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Reklasifikasi_aset.id',
                'Reklasifikasi_aset.kode_satker',
                'Reklasifikasi_aset.6digit_kodesatker',
                'Reklasifikasi_aset.nama_satker',
                'Reklasifikasi_aset.reklas_keluar',
                'Reklasifikasi_aset.reklas_masuk',
                'Reklasifikasi_aset.selisih',
                'Reklasifikasi_aset.penjelasan',
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Reklasifikasi_aset.penjelasan');
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_satker',
            '6digit_kodesatker',
            'nama_satker',
            'reklas_keluar',
            'reklas_masuk',
            'selisih',
            'penjelasan'
        ];
    }
}