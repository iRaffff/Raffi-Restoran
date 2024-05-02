<?php

namespace App\Imports;

use App\Models\Absensi;
use App\Models\AbsensiKerja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new AbsensiKerja([
            'nama_karyawan' => $row['nama_karyawan'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'waktu_masuk' => $row['waktu_masuk'],
            'status' => $row['status'],
            'waktu_selesai_kerja' => $row['waktu_selesai_kerja']
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
