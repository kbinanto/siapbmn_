<?php

namespace App\Exports;

use App\Models\Tktm;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;




class TktmExport_AnalisaData implements FromQuery, WithHeadings
{

    public function query()
    {
        return Tktm::query()
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
            ->whereNotNull('Tktm.penjelasan')
            ->where('Tktm.checklist', '=', NULL)
            ->distinct('tktm.id');
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