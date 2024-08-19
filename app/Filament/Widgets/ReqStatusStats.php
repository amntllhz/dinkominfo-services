<?php

namespace App\Filament\Widgets;

use App\Models\RequestSubmission;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ReqStatusStats extends BaseWidget
{
    protected function getStats(): array
    {
        $data = RequestSubmission::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');
        return [
            Stat::make('Total Pending', $data['Pending'] ?? 0),
            Stat::make('Total Completed', $data['Completed'] ?? 0),
            Stat::make('Total In Progress', $data['In Progress'] ?? 0),
            Stat::make('Total Rejected', $data['Rejected'] ?? 0),
        ];
    }
}
