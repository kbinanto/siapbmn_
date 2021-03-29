<?php

namespace App\Imports;

use App\Models\Nilai_buku_minus_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Nilai_buku_minusImport_tmp implements ToModel, WithStartRow
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
        return new Nilai_buku_minus_tmp([
            'id' => $row[0],
            'sap' => $row[1],
            'kode_satker' => $row[2],
            '6digit_kodesatker' => $row[3],
            'nama_satker' => $row[4],
            'kode_barang' => $row[5],
            'nama_barang' => $row[6],
            'nomor_aset' => $row[7],
            'rph_aset' => $row[8],
            'rph_susut' => $row[9],
            'rph_buku' => $row[10],
            'penjelasan' => $row[11]

        ]);
    }
}