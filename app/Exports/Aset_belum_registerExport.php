<?php

namespace App\Exports;

use App\Models\Aset_belum_register;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;



class Aset_belum_registerExport implements FromQuery, WithHeadings
{

    public function query()
    {
        return Aset_belum_register::query()->join('referensi_wilayah', 'Aset_belum_register.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Aset_belum_register.id',
                'Aset_belum_register.kode_satker',
                'Aset_belum_register.6digit_kodesatker',
                'Aset_belum_register.nama_satker',
                'Aset_belum_register.akun',
                'Aset_belum_register.nama_akun',
                'Aset_belum_register.rupiah',
                'Aset_belum_register.penjelasan',
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Aset_belum_register.penjelasan');
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_satker',
            '6digit_kodesatker',
            'nama_satker',
            'akun',
            'nama_akun',
            'rupiah',
            'Penjelasan'
        ];
    }
}