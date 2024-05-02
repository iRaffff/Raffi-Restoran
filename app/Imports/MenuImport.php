<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new Menu([
            'jenis_id' => $row['jenis_id'],
            'nama_menu' => $row['nama_menu'],
            'harga' => $row['harga'],
            'image' => $row['image'],
            'deskripsi' => $row['deskripsi']
        ]);
        return null;
    }

    public function headingRow(): int
    {
        return 3; // Nomor baris tempat judul kolom berada
    }

    // // Metode untuk melakukan validasi data
    // private function isValidData($row)
    // {
    //     // Misalnya, lakukan pemeriksaan apakah data yang diperlukan tidak kosong
    //     if (!empty($row['id']) && !empty($row['nama_jenis'])) {
    //         return true;
    //     }        

    //     return false;
    // }
}
