<?php

namespace App\Exports;

use App\Models\Saldo_tidak_normal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;




class Saldo_tidak_normalExport_AnalisaData implements FromQuery, WithHeadings
{

    public function query()
    {
        return Saldo_tidak_normal::query()->join('referensi_wilayah', 'Saldo_tidak_normal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Saldo_tidak_normal.id',
                'Saldo_tidak_normal.kode_satker',
                'Saldo_tidak_normal.6digit_kodesatker',
                'Saldo_tidak_normal.nama_satker',
                'Saldo_tidak_normal.trn',
                'Saldo_tidak_normal.akun',
                'Saldo_tidak_normal.uraian_akun',
                'Saldo_tidak_normal.debet',
                'Saldo_tidak_normal.kredit',
                'Saldo_tidak_normal.saldo_normal',
                'Saldo_tidak_normal.keterangan',
                'Saldo_tidak_normal.penjelasan',
            )
            ->whereNotNull('Saldo_tidak_normal.penjelasan')
            ->where('Saldo_tidak_normal.checklist', '=', NULL);
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_satker',
            '6digit_kodesatker',
            'nama_satker',
            'trn',
            'akun',
            'uraian_akun',
            'debet',
            'kredit',
            'saldo_normal',
            'keterangan',
            'penjelasan'
        ];
    }
}