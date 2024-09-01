<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $idx = 0;
    public function collection()
    {
        return Report::with(['instansi', 'service'])->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Tanggal',
            'Service',
            'Nama Pelapor',
            'Instansi ID',
            'Email',
            'Phone',
            'Report',
        ];
    }

    public function map($report): array
    {
        $this->idx++;
        return [
            $this->idx,
            date('Y-m-d', strtotime($report->created_at)),
            $report->service->name ?? '',
            $report->name,
            $report->instansi->name ?? '',
            $report->email,
            $report->phone,
            $report->report,
        ];
    }
}
