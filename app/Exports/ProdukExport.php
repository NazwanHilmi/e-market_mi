<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeAfter;


class ProdukExport implements FromCollection, WithHeadings, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produk::all();
    }

    public function headings():array
    {
        return [
            'No.',
            'Nama Produk',
            'Tanggal Input',
            'Tanggal Update'
        ];
    }

    public function title(): string 
    {
        return 'Data';
    }

    public function registerEvents(): array {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getColumnDimension('A')->setWidth(5);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setWidth(35);
                $event->sheet->getColumnDimension('D')->setWidth(35);

                // Judul Atas
                $event->sheet->insertNewRowBefore(1,3);
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->mergeCells('A2:D2');
                $event->sheet->setCellValue('A1', "DATA PRODUK");
                $event->sheet->setCellValue('A2', "PER TANGGAL".date(' d-m-y'));

                // Style
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A2')->getFont()->setBold(true);
                $event->sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A4:D'.$event->sheet->getHighestRow())->applyFromArray([
                    'borders'=> [
                        'allBorders'=> [
                            'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'=>['argb' => '000']
                        ]
                    ]

                ]);
                $event->sheet->getStyle('A4:D4')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFEA00', // Kode warna hitam
                        ],
                    ],
                ]);
            }
        ];
    }
}
