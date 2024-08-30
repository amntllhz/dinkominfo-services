<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Exports\ReportExporter;
use App\Filament\Resources\ReportResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction as TablesExportAction;

class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\CreateAction::make(),
        ];
    }
}
