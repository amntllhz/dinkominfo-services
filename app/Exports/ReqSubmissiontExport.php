<?php

namespace App\Exports;

use App\Models\RequestSubmission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReqSubmissiontExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $idx = 0;
    public function collection()
    {
        return
            RequestSubmission::with(['instansi', 'service'])->get();
    }
    public function headings(): array
    {
        return [
            'No.',
            'Tanggal',
            'Service',
            'Nama Pemohon',
            'Instansi',
            'Email',
            'Phone',
            'Status',
        ];
    }

    public function map($requestSubmission): array
    {
        $this->idx++;
        return [
            $this->idx,
            date('Y-m-d', strtotime($requestSubmission->created_at)),
            $requestSubmission->service->name ?? '',
            $requestSubmission->applicant,
            $requestSubmission->instansi->name ?? '',
            $requestSubmission->email,
            $requestSubmission->phone,
            $requestSubmission->status,
        ];
    }
}
