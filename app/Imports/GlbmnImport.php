<?php

namespace App\Imports;

use App\Models\Glbmn;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GlbmnImport implements ToModel, WithStartRow
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
        return new Glbmn([
            'kode_satker' => $row[1],
            '6digit_kodesatker' => substr($row[1], 7, 6),
            'nama_satker' => $row[2],
            'akun' => $row[3],
            'uraian' => $row[4],
            'rph_saiba' => $row[5],
            'rph_intra' => $row[6],
            'rph_kdp' => $row[7],
            'rph_ekstra' => $row[8],
            'rph_selisih' => $row[9]

        ]);
    }
}