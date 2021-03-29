<?php

namespace App\Imports;

use App\Models\Glbmn_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GlbmnImport_tmp implements ToModel, WithStartRow
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
        return new Glbmn_tmp([
            'id' => $row[0],
            'kode_satker' => $row[1],
            '6digit_kodesatker' => $row[2],
            'nama_satker' => $row[3],
            'akun' => $row[4],
            'uraian' => $row[5],
            'rph_saiba' => $row[6],
            'rph_intra' => $row[7],
            'rph_kdp' => $row[8],
            'rph_ekstra' => $row[9],
            'rph_selisih' => $row[10],
            'penjelasan' => $row[11]

        ]);
    }
}