<?php

namespace App\Exports;

use App\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Kelas::all();
    }

    public function headings(): array
    {
        return [
            'ID', 'Name', 'Class'
        ];
    }
}
