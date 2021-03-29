<?php

namespace App\Exports;

use App\Models\Nilai_buku_minus;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;





class Nilai_buku_minusExport implements FromQuery, WithHeadings
{

    public function query()
    {
        return Nilai_buku_minus::query()->join('referensi_wilayah', 'Nilai_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_buku_minus.id',
                'Nilai_buku_minus.sap',
                'Nilai_buku_minus.kode_satker',
                'Nilai_buku_minus.6digit_kodesatker',
                'Nilai_buku_minus.nama_satker',
                'Nilai_buku_minus.kode_barang',
                'Nilai_buku_minus.nama_barang',
                'Nilai_buku_minus.nomor_aset',
                'Nilai_buku_minus.rph_aset',
                'Nilai_buku_minus.rph_susut',
                'Nilai_buku_minus.rph_buku',
                'Nilai_buku_minus.penjelasan',
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Nilai_buku_minus.penjelasan');
    }

    public function headings(): array
    {
        return [
            'id',
            'sap',
            'kode_satker',
            '6digit_kodesatker',
            'nama_satker',
            'kode_barang',
            'nama_barang',
            'nomor_aset',
            'rph_aset',
            'rph_susut',
            'rph_buku',
            'Penjelasan'
        ];
    }
}