<?php

namespace App\Filament\Resources\RequestSubmissionResource\Pages;

use App\Filament\Resources\RequestSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRequestSubmission extends EditRecord
{
    protected static string $resource = RequestSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
