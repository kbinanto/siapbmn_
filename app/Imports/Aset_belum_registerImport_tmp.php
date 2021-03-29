<?php

namespace App\Imports;

use App\Models\Aset_belum_register_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Aset_belum_registerImport_tmp implements ToModel, WithStartRow
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
        return new Aset_belum_register_tmp([
            'id' => $row[0],
            'kode_satker' => $row[1],
            '6digit_kodesatker' => $row[2],
            'nama_satker' => $row[3],
            'akun' => $row[4],
            'nama_akun' => $row[5],
            'rupiah' => $row[6],
            'penjelasan' => $row[7]

        ]);
    }
}