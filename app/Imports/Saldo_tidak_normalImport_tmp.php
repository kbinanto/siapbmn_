<?php

namespace App\Imports;

use App\Models\Saldo_tidak_normal_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Saldo_tidak_normalImport_tmp implements ToModel, WithStartRow
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
        return new Saldo_tidak_normal_tmp([
            'id' => $row[0],
            'kode_satker' => $row[1],
            '6digit_kodesatker' => $row[2],
            'nama_satker' => $row[3],
            'trn' => $row[4],
            'akun' => $row[5],
            'uraian_akun' => $row[6],
            'debet' => $row[7],
            'kredit' => $row[8],
            'saldo_normal' => $row[9],
            'keterangan' => $row[10],
            'penjelasan' => $row[11]

        ]);
    }
}