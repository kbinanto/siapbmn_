<?php

namespace App\Exports;

use App\Models\Tktm;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;




class TktmExport implements FromQuery, WithHeadings
{

    public function query()
    {
        return Tktm::query()->join('referensi_wilayah', function ($join) {
            $join->on('tktm.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                ->orOn('tktm.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
        })
            ->select(
                'Tktm.id',
                'Tktm.kode_satker_pengirim',
                'Tktm.6digit_kodesatkerpengirim',
                'Tktm.nama_satker_pengirim',
                'Tktm.kode_akun_pengirim',
                'Tktm.uraian_akun_pengirim',
                'Tktm.transfer_keluar',
                'Tktm.kode_satker_penerima',
                'Tktm.6digit_kodesatkerpenerima',
                'Tktm.nama_satker_penerima',
                'Tktm.transfer_masuk',
                'Tktm.selisih',
                'Tktm.penjelasan'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Tktm.penjelasan')
            ->distinct('Tktm.id');
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_satker_pengirim',
            '6digit_kodesatkerpengirim',
            'nama_satker_pengirim',
            'kode_akun_pengirim',
            'uraian_akun_pengirim',
            'transfer_keluar',
            'kode_satker_penerima',
            '6digit_kodesatkerpenerima',
            'nama_satker_penerima',
            'transfer_masuk',
            'selisih',
            'penjelasan'
        ];
    }
}