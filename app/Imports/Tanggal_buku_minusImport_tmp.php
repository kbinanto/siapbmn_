<?php

namespace App\Imports;

use App\Models\Tanggal_buku_minus_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Tanggal_buku_minusImport_tmp implements ToModel, WithStartRow
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
        return new Tanggal_buku_minus_tmp([
            'id' => $row[0],
            'kode_satker' => $row[1],
            '6digit_kodesatker' => $row[2],
            'nama_satker' => $row[3],
            'kode_barang' => $row[4],
            'nomor_aset' => $row[5],
            'tgl_buku' => $row[6],
            'tgl_perolehan' => $row[7],
            'penjelasan' => $row[8]
        ]);
    }
}