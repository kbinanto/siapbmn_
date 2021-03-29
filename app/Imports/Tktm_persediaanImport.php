<?php

namespace App\Imports;

use App\Models\Tktm_persediaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Tktm_persediaanImport implements ToModel, WithStartRow
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
        return new Tktm_persediaan([
            'kode_satker_pengirim' => $row[1],
            '6digit_kodesatkerpengirim' => substr($row[1], 7, 6),
            'nama_satker_pengirim' => $row[2],
            'kode_barang_pengirim' => $row[3],
            'uraian_barang_pengirim' => $row[4],
            'kuantitas_pengirim' => $row[5],
            'rp_transferkeluar' => $row[6],
            'kode_satker_penerima' => $row[7],
            '6digit_kodesatkerpenerima' =>  substr($row[7], 7, 6),
            'nama_satker_penerima' => $row[8],
            'kuantitas_penerima' => $row[9],
            'rp_transfermasuk' => $row[10],
            'selisih_kuantitas' => $row[11],
            'selisih_rp' => $row[12]
        ]);
    }
}