<?php

namespace App\Filament\Widgets;

use App\Models\RequestSubmission;
use App\Models\Service;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

// class ReqServicesChart extends ChartWidget
// {
//     protected static ?string $heading = 'Chart';

//     protected function getData(): array
//     {

//         $data = Trend::model(RequestSubmission::class)
//             ->between(
//                 start: now()->startOfWeek(),
//                 end: now()->endOfWeek(),
//             )
//             ->perDay()
//             ->count();

//         return [
//             'datasets' => [
//                 [
//                     'label' => 'Services',
//                     'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
//                 ],
//             ],
//             'labels' => $data->map(fn(TrendValue $value) => $value->date),

//         ];
//     }

//     protected function getType(): string
//     {
//         return 'line';
//     }
// }
// class ReqServicesChart extends ChartWidget
// {
//     protected static ?string $heading = 'Services Chart';

//     protected function getData(): array
//     {
//         $services = Service::all();
//         $datasets = [];

//         foreach ($services as $service) {
//             $data = Trend::model(RequestSubmission::class)
//                 ->between(
//                     start: now()->startOfWeek(),
//                     end: now()->endOfWeek(),
//                 )
//                 ->perDay()
//                 ->count()
//                 ->where('service_id', $service->id);

//             $datasets[] = [
//                 'label' => $service->name,
//                 'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
//                 'borderColor' => $this->getRandomColor(),
//                 'fill' => false,
//             ];
//         }

//         return [
//             'datasets' => $datasets,
//             'labels' => Trend::model(RequestSubmission::class)
//                 ->between(
//                     start: now()->startOfWeek(),
//                     end: now()->endOfWeek(),
//                 )
//                 ->perDay()
//                 ->count()
//                 ->map(fn(TrendValue $value) => $value->date),
//         ];
//     }

//     protected function getType(): string
//     {
//         return 'line';
//     }

//     protected function getRandomColor(): string
//     {
//         return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
//     }
// }

class ReqServicesChart extends ChartWidget
{
    protected static ?string $heading = 'Pengajuan Layanan';

    // Define a fixed set of colors
    protected array $colors = [
        '#FF5733', // Warna pertama
        '#33FF57', // Warna kedua
        '#3357FF', // Warna ketiga
        '#FF33A8', // Warna keempat
        '#33FFF7', // Warna kelima
        '#F7FF33', // Warna keenam
        '#A833FF', // Warna ketujuh
    ];

    protected function getData(): array
    {
        $startDate = now()->startOfWeek();
        $endDate = now()->endOfWeek();

        $services = Service::whereHas('requestSubmissions', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        })->get();

        $datasets = [];
        $labels = [];

        foreach ($services as $index => $service) {
            $data = Trend::query(RequestSubmission::where('service_id', $service->id))
                ->between(
                    start: $startDate,
                    end: $endDate,
                )
                ->perDay()
                ->count();

            $datasets[] = [
                'label' => $service->name,
                'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                'borderColor' => $this->colors[$index % count($this->colors)],
                'fill' => false,
            ];

            // Set the labels once
            if (empty($labels)) {
                $labels = $data->map(fn(TrendValue $value) => $value->date);
            }
        }

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
