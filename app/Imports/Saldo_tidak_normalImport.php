<?php

namespace App\Imports;

use App\Models\Saldo_tidak_normal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Saldo_tidak_normalImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Saldo_tidak_normal([
            'kode_satker' => $row[1],
            '6digit_kodesatker' => substr($row[1], 7, 6),
            'nama_satker' => $row[2],
            'trn' => $row[3],
            'akun' => $row[4],
            'uraian_akun' => $row[5],
            'debet' => $row[6],
            'kredit' => $row[7],
            'saldo_normal' => $row[8],
            'keterangan' => $row[9]

        ]);
    }
}