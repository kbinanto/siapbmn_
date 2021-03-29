<?php

namespace App\Imports;

use App\Models\Sp2d53_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Sp2d53Import_tmp implements ToModel, WithStartRow
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
        return new Sp2d53_tmp([
            'id' => $row[0],
            'kode_satker' => $row[1],
            '6digit_kodesatker' => $row[2],
            'nama_satker' => $row[3],
            'akun' => $row[4],
            'no_dokumen' => $row[5],
            'tgl_dokumen' => $row[6],
            'rph_saiba' => $row[7],
            'rph_simak' => $row[8],
            'rph_selisih' => $row[9],
            'penjelasan' => $row[10]

        ]);
    }
}