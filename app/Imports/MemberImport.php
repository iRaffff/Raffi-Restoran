<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MemberImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new Member([
            'nama_pelanggan' => $row['nama_pelanggan'],
            'email' => $row['email'],
            'alamat' => $row['alamat']
        ]);
        return null;
    }

    public function headingRow(): int
    {
        return 3;
    }
}
