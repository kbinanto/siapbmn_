<?php

namespace App\Exports;

use App\Models\Tanggal_buku_minus;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;




class Tanggal_buku_minusExport_AnalisaData implements FromQuery, WithHeadings
{

    public function query()
    {
        return Tanggal_buku_minus::query()->join('referensi_wilayah', 'Tanggal_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Tanggal_buku_minus.id',
                'Tanggal_buku_minus.kode_satker',
                'Tanggal_buku_minus.6digit_kodesatker',
                'Tanggal_buku_minus.nama_satker',
                'Tanggal_buku_minus.kode_barang',
                'Tanggal_buku_minus.nomor_aset',
                'Tanggal_buku_minus.tgl_buku',
                'Tanggal_buku_minus.tgl_perolehan',
                'Tanggal_buku_minus.penjelasan',
            )
            ->whereNotNull('Tanggal_buku_minus.penjelasan')
            ->where('Tanggal_buku_minus.checklist', '=', NULL);
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_satker',
            '6digit_kodesatker',
            'nama_satker',
            'kode_barang',
            'nomor_aset',
            'tgl_buku',
            'tgl_perolehan',
            'penjelasan'
        ];
    }
}