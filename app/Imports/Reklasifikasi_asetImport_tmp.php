<?php

namespace App\Imports;

use App\Models\Reklasifikasi_aset_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Reklasifikasi_asetImport_tmp implements ToModel, WithStartRow
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
        return new Reklasifikasi_aset_tmp([
            'id' => $row[0],
            'kode_satker' => $row[1],
            '6digit_kodesatker' => $row[2],
            'nama_satker' => $row[3],
            'reklas_keluar' => $row[4],
            'reklas_masuk' => $row[5],
            'selisih' => $row[6],
            'penjelasan' => $row[7]

        ]);
    }
}