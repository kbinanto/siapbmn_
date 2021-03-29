<?php

namespace App\Imports;

use App\Models\RekonsiliasiInternal_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RekonsiliasiInternalImport_tmp implements ToModel, WithStartRow
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
        return new RekonsiliasiInternal_tmp([
            'id' => $row[0],
            'kode_satker' => $row[1],
            '6digit_kodesatker' => $row[2],
            'nama_satker' => $row[3],
            'akun' => $row[4],
            'uraian' => $row[5],
            'rph_saiba' => $row[6],
            'rph_simak' => $row[7],
            'rph_selisih' => $row[8],
            'penjelasan' => $row[9]

        ]);
    }
}