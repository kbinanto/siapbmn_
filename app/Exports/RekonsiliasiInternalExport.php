<?php

namespace App\Exports;

use App\Models\RekonsiliasiInternal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;




class RekonsiliasiInternalExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return RekonsiliasiInternal::query()->join('referensi_wilayah', 'rekonsiliasi_internal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'rekonsiliasi_internal.id',
                'rekonsiliasi_internal.kode_satker',
                'rekonsiliasi_internal.6digit_kodesatker',
                'rekonsiliasi_internal.nama_satker',
                'rekonsiliasi_internal.akun',
                'rekonsiliasi_internal.uraian',
                'rekonsiliasi_internal.rph_saiba',
                'rekonsiliasi_internal.rph_simak',
                'rekonsiliasi_internal.rph_selisih',
                'rekonsiliasi_internal.penjelasan',
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('rekonsiliasi_internal.penjelasan');
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
            'rph_simak',
            'rph_selisih',
            'penjelasan'
        ];
    }
}
