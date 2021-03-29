<?php

namespace App\Imports;

use App\Models\Reklasifikasi_aset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Reklasifikasi_asetImport implements ToModel, WithStartRow
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
        return new Reklasifikasi_aset([
            'kode_satker' => $row[1],
            '6digit_kodesatker' => substr($row[1], 7, 6),
            'nama_satker' => $row[2],
            'reklas_keluar' => $row[3],
            'reklas_masuk' => $row[4],
            'selisih' => $row[5]

        ]);
    }
}