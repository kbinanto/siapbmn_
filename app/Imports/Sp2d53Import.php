<?php

namespace App\Imports;

use App\Models\Sp2d53;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Sp2d53Import implements ToModel, WithStartRow
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
        return new Sp2d53([
            'kode_satker' => $row[1],
            '6digit_kodesatker' => substr($row[1], 7, 6),
            'nama_satker' => $row[2],
            'akun' => $row[3],
            'no_dokumen' => $row[4],
            'tgl_dokumen' => $row[5],
            'rph_saiba' => $row[6],
            'rph_simak' => $row[7],
            'rph_selisih' => $row[8]

        ]);
    }
}