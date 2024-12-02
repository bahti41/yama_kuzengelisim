<?php

namespace App\Exports;

use App\Models\Mesaj;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class QuoteExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Mesaj::select('adi', 'email', 'telefon', 'konu', 'mesaj')->get();
    }

    public function headings(): array
    {
        return ['Adı', 'Email', 'Telefon', 'Konu', 'Mesaj'];
    }

    public function styles(Worksheet $sheet)
    {
        // Başlıklar için stil
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);

        // Tüm hücrelerde metin sarma ve satır yüksekliği
        $sheet->getStyle('A:E')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A:E')->getAlignment()->setHorizontal('center');
        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        return [];
    }
}
