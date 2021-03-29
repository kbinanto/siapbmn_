<?php

namespace App\Imports;

use App\Models\Tktm;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TktmImport implements ToModel, WithStartRow
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
        return new Tktm([
            'kode_satker_pengirim' => $row[1],
            '6digit_kodesatkerpengirim' => substr($row[1], 7, 6),
            'nama_satker_pengirim' => $row[2],
            'kode_akun_pengirim' => $row[3],
            'uraian_akun_pengirim' => $row[4],
            'transfer_keluar' => $row[5],
            'kode_satker_penerima' => $row[6],
            '6digit_kodesatkerpenerima' => substr($row[6], 7, 6),
            'nama_satker_penerima' => $row[7],
            'transfer_masuk' => $row[8],
            'selisih' => $row[9]
        ]);
    }
}