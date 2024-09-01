<?php

namespace App\Filament\Resources\RequestSubmissionResource\Pages;

use App\Exports\ReqSubmissiontExport;
use App\Filament\Resources\RequestSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListRequestSubmissions extends ListRecords
{
    protected static string $resource = RequestSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('export')
                ->label('Export')
                ->action('export')
                ->color('success'),
        ];
    }
    public function export()
    {
        return Excel::download(new ReqSubmissiontExport, 'request_submissions.xlsx');
    }
}
