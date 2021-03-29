<?php

namespace App\Exports;

use App\Models\Sp2d53;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Sp2d53Export_AnalisaData implements FromQuery, WithHeadings
{

    public function query()
    {
        return Sp2d53::query()->join('referensi_wilayah', 'Sp2d53.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Sp2d53.id',
                'Sp2d53.kode_satker',
                'Sp2d53.6digit_kodesatker',
                'Sp2d53.nama_satker',
                'Sp2d53.akun',
                'Sp2d53.no_dokumen',
                'Sp2d53.tgl_dokumen',
                'Sp2d53.rph_saiba',
                'Sp2d53.rph_simak',
                'Sp2d53.rph_selisih',
                'Sp2d53.penjelasan',
            )
            ->whereNotNull('Sp2d53.penjelasan')
            ->where('Sp2d53.checklist', '=', NULL);
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_satker',
            '6digit_kodesatker',
            'nama_satker',
            'akun',
            'no_dokumen',
            'tgl_dokumen',
            'rph_saiba',
            'rph_simak',
            'rph_selisih',
            'penjelasan'

        ];
    }
}