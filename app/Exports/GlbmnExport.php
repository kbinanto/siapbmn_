<?php

namespace App\Exports;

use App\Models\Glbmn;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;



class GlbmnExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Glbmn::query()->join('referensi_wilayah', 'glbmn.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'glbmn.id',
                'glbmn.kode_satker',
                'glbmn.6digit_kodesatker',
                'glbmn.nama_satker',
                'glbmn.akun',
                'glbmn.uraian',
                'glbmn.rph_saiba',
                'glbmn.rph_intra',
                'glbmn.rph_kdp',
                'glbmn.rph_ekstra',
                'glbmn.rph_selisih',
                'glbmn.penjelasan',
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('glbmn.penjelasan');
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_satker',
            '6digit_kodesatker',
            'nama_satker',
            'akun',
            'uraian',
            'rph_saiba',
            'rph_intra',
            'rph_kdp',
            'rph_ekstra',
            'rph_selisih',
            'Penjelasan'
        ];
    }
}