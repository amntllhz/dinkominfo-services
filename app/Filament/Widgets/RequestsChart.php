<?php

namespace App\Filament\Widgets;

use App\Models\RequestSubmission;
use App\Models\Service;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\DB;

class RequestsChart extends ChartWidget
{

    protected static ?string $heading = 'Request Submissions by Service';

    protected function getData(): array
    {
        $services = Service::all();
        $datasets = [];
        $allDates = collect();

        $colors = [
            '#FF6384', // Merah muda
            '#36A2EB', // Biru
            '#FFCE56', // Kuning
            '#4BC0C0', // Hijau toska
            '#9966FF', // Ungu
            '#FF9F40', // Oranye
            '#FF6384', // Merah muda (ulangi jika lebih dari 7 layanan)
        ];

        foreach ($services as $index => $service) {
            $data = RequestSubmission::where('service_id', $service->id)
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->pluck('count', 'date');

            $allDates = $allDates->union($data->keys());

            $datasets[] = [
                'label' => $service->name,
                'data' => $data->toArray(),
                'borderColor' => $colors[$index % count($colors)],
                'backgroundColor' => $colors[$index % count($colors)], // Tambahkan transparansi
                'fill' => false,
            ];
        }

        $allDates = $allDates->sort()->values();

        foreach ($datasets as &$dataset) {
            $filledData = [];
            foreach ($allDates as $date) {
                $filledData[$date] = $dataset['data'][$date] ?? 0;
            }
            $dataset['data'] = array_values($filledData);
        }

        return [
            'datasets' => $datasets,
            'labels' => $allDates->map(function ($date) {
                return \Carbon\Carbon::parse($date)->format('d M ');
            })->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }



    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Jumlah Permohonan Layanan',
                    ],

                ],

                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Date',
                    ],
                ],
            ],
        ];
    }
}
