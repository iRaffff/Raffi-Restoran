<?php

namespace App\Exports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

class MenuExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Menu::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Jenis Id',
            'Nama Menu',
            'Harga',
            'Image',
            'Deskripsi'
        ];
    }
}
