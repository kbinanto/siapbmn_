<?php

namespace App\Imports;

use App\Models\Aset_belum_register;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Aset_belum_registerImport implements ToModel, WithStartRow
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
        return new Aset_belum_register([
            'kode_satker' => $row[1],
            '6digit_kodesatker' => substr($row[1], 7, 6),
            'nama_satker' => $row[2],
            'akun' => $row[3],
            'nama_akun' => $row[4],
            'rupiah' => $row[5]

        ]);
    }
}