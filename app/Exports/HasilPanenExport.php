<?php

namespace App\Exports;

use App\Models\HasilPanen;
use App\Models\Kecamatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class HasilPanenExport implements FromView, WithEvents, ShouldAutoSize
{
    public function __construct(string $per)
    {
        $this->per = $per;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // $event->sheet->getDelegate()->getStyle('A1:K14')->getAlignment(Alignment::VERTICAL_CENTER);

                $AlignmentCenter = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical'   => Alignment::VERTICAL_CENTER
                    ],
                ];

                $fillHead = [
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FF72a3e0'
                        ]
                    ]
                ];

                $allBorder = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN
                        ]
                    ]
                ];

                $hasil = HasilPanen::with('kecamatan', 'kelurahan')->get();
                if($this->per != "Seluruh Daerah") {
                    $kecamatan = Kecamatan::where('nama', $this->per)->first();
                    $hasil = HasilPanen::with('kecamatan', 'kelurahan')->where('kecamatan_id', $kecamatan->id)->get();
                }

                // Head
                $event->getDelegate()->getStyle('A1:K1');

                $event->getDelegate()->getStyle('A1:K' . count($hasil) + 1)->applyFromArray($AlignmentCenter);
                $event->getDelegate()->getStyle('A1:K' . count($hasil) + 1)->applyFromArray($allBorder);

                $event->getDelegate()->getStyle('A1:K1')->applyFromArray($fillHead);
                $event->getDelegate()->getStyle('A1:K1')->getFont()->setSize(14);
                $event->getDelegate()->getStyle('A1:K1')->getFont()->setBold(true);
                $event->getDelegate()->getRowDimension('1')->setRowHeight(30);
            }
        ];
    }

    public function view(): View
    {
        $hasil = HasilPanen::with('kecamatan', 'kelurahan')->get();
        if($this->per != "Seluruh Daerah") {
            $kecamatan = Kecamatan::where('nama', $this->per)->first();
            $hasil = HasilPanen::with('kecamatan', 'kelurahan')->where('kecamatan_id', $kecamatan->id)->get();
        }
        
        return view('auth.export.seluruh-daerah', [
            'hasil' => $hasil
        ]);
    }
}
