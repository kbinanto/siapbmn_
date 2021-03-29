<?php

namespace App\Exports;

use App\Models\Tktm_persediaan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;





class tktm_persediaanExport_AnalisaData implements FromQuery, WithHeadings
{

    public function query()
    {
        return Tktm_persediaan::query()->join('referensi_wilayah', function ($join) {
            $join->on('tktm_persediaan.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                ->orOn('tktm_persediaan.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
        })
            ->select(
                'tktm_persediaan.id',
                'tktm_persediaan.kode_satker_pengirim',
                'tktm_persediaan.6digit_kodesatkerpengirim',
                'tktm_persediaan.nama_satker_pengirim',
                'tktm_persediaan.kode_barang_pengirim',
                'tktm_persediaan.uraian_barang_pengirim',
                'tktm_persediaan.kuantitas_pengirim',
                'tktm_persediaan.rp_transferkeluar',
                'tktm_persediaan.kode_satker_penerima',
                'tktm_persediaan.6digit_kodesatkerpenerima',
                'tktm_persediaan.nama_satker_penerima',
                'tktm_persediaan.kuantitas_penerima',
                'tktm_persediaan.rp_transfermasuk',
                'tktm_persediaan.selisih_kuantitas',
                'tktm_persediaan.selisih_rp',
                'tktm_persediaan.penjelasan'
            )
            ->whereNotNull('tktm_persediaan.penjelasan')
            ->where('tktm_persediaan.checklist', '=', NULL)
            ->distinct('tktm_persediaan.id');
    }
    public function headings(): array
    {
        return [
            'id',
            'kode_satker_pengirim',
            '6digit_kodesatkerpengirim',
            'nama_satker_pengirim',
            'kode_barang_pengirim',
            'uraian_barang_pengirim',
            'kuantitas_pengirim',
            'rp_transferkeluar',
            'kode_satker_penerima',
            '6digit_kodesatkerpenerima',
            'nama_satker_penerima',
            'kuantitas_penerima',
            'rp_transfermasuk',
            'selisih_kuantitas',
            'selisih_rp',
            'penjelasan'
        ];
    }
}