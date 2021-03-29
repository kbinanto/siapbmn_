<?php

namespace App\Imports;

use App\Models\Tanggal_buku_minus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Tanggal_buku_minusImport implements ToModel, WithStartRow
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
        return new Tanggal_buku_minus([
            'kode_satker' => $row[1],
            '6digit_kodesatker' => substr($row[1], 7, 6),
            'nama_satker' => $row[2],
            'kode_barang' => $row[3],
            'nomor_aset' => $row[4],
            'tgl_buku' => $row[5],
            'tgl_perolehan' => $row[6]
        ]);
    }
}