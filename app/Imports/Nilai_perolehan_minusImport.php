<?php

namespace App\Imports;

use App\Models\Nilai_perolehan_minus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Nilai_perolehan_minusImport implements ToModel, WithStartRow
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
        return new Nilai_perolehan_minus([
            'sap' => $row[1],
            'kode_satker' => $row[2],
            '6digit_kodesatker' => substr($row[2], 7, 6),
            'nama_satker' => $row[3],
            'kode_barang' => $row[4],
            'nama_barang' => $row[5],
            'nomor_aset' => $row[6],
            'rph_aset' => $row[7]

        ]);
    }
}