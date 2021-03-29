<?php

namespace App\Imports;

use App\Models\Tktm_persediaan_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Tktm_persediaanImport_tmp implements ToModel, WithStartRow
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
        return new Tktm_persediaan_tmp([
            'id' => $row[0],
            'kode_satker_pengirim' => $row[1],
            '6digit_kodesatkerpengirim' => $row[2],
            'nama_satker_pengirim' => $row[3],
            'kode_barang_pengirim' => $row[4],
            'uraian_barang_pengirim' => $row[5],
            'kuantitas_pengirim' => $row[6],
            'rp_transferkeluar' => $row[7],
            'kode_satker_penerima' => $row[8],
            '6digit_kodesatkerpenerima' => $row[9],
            'nama_satker_penerima' => $row[10],
            'kuantitas_penerima' => $row[11],
            'rp_transfermasuk' => $row[12],
            'selisih_kuantitas' => $row[13],
            'selisih_rp' => $row[14],
            'penjelasan' => $row[15]
        ]);
    }
}