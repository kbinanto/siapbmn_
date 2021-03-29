<?php

namespace App\Exports;

use App\Models\Nilai_perolehan_minus;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;




class Nilai_perolehan_minusExport_AnalisaData implements FromQuery, WithHeadings
{

    public function query()
    {
        return Nilai_perolehan_minus::query()->join('referensi_wilayah', 'Nilai_perolehan_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_perolehan_minus.id',
                'Nilai_perolehan_minus.sap',
                'Nilai_perolehan_minus.kode_satker',
                'Nilai_perolehan_minus.6digit_kodesatker',
                'Nilai_perolehan_minus.nama_satker',
                'Nilai_perolehan_minus.kode_barang',
                'Nilai_perolehan_minus.nama_barang',
                'Nilai_perolehan_minus.nomor_aset',
                'Nilai_perolehan_minus.rph_aset',
                'Nilai_perolehan_minus.penjelasan',
            )
            ->whereNotNull('Nilai_perolehan_minus.penjelasan')
            ->where('Nilai_perolehan_minus.checklist', '=', NULL);
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
            'penjelasan'
        ];
    }
}