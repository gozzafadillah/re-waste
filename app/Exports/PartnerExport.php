<?php

namespace App\Exports;

use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PartnerExport implements FromQuery, WithHeadings, WithStyles, WithColumnWidths
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function headings(): array
    {
        return [
            'Items Name',
            'Category',
            'Qty',
            'Upload'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 35,
        ];
    }

    public function query()
    {
        $results = Partner::query()
            ->join('wastes', 'wastes.partner_id', '=', 'partners.id')
            ->join('items', 'wastes.item_id', '=', 'items.id')
            ->where('wastes.partner_id', $this->id)
            ->select('items.item_name', 'items.category', DB::raw("concat(wastes.qty, ' ', wastes.category_qty)"), DB::raw('DATE_FORMAT(wastes.created_at , "%d %M %Y")'))
            ->orderByDesc('wastes.created_at');
        return $results;
    }
}
