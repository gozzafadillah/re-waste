<?php

namespace App\Exports;

use App\Models\Waste;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class WasteExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(Waste::getAllWastes());
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Partner Name',
            'Item Name',
            'Qty',
            'Category Waste'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 20,
            'C' => 20,
            'D' => 30,
            'E' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
