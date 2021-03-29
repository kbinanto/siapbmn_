<?php

namespace App\Imports;

use App\Models\Tktm_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TktmImport_tmp implements ToModel, WithStartRow
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
        return new Tktm_tmp([
            'id' => $row[0],
            'kode_satker_pengirim' => $row[1],
            '6digit_kodesatkerpengirim' => $row[2],
            'nama_satker_pengirim' => $row[3],
            'kode_akun_pengirim' => $row[4],
            'uraian_akun_pengirim' => $row[5],
            'transfer_keluar' => $row[6],
            'kode_satker_penerima' => $row[7],
            '6digit_kodesatkerpenerima' => $row[8],
            'nama_satker_penerima' => $row[9],
            'transfer_masuk' => $row[10],
            'selisih' => $row[11],
            'penjelasan' => $row[12]
        ]);
    }
}