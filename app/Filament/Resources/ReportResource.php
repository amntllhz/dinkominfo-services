<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ReportExporter;
use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Actions\Action;
use Filament\Actions\ExportAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction as ActionsExportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\Select::make('service_id')
                    ->label('Pilih Layanan')
                    ->relationship('service', 'name')
                    ->required(),

                Forms\Components\Select::make('instansi_id')
                    ->label('Pilih Instansi')
                    ->relationship('instansi', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->required(),
                Forms\Components\Textarea::make('report')
                    ->label('Report')
                    ->required(),
                Forms\Components\FileUpload::make('proof')
                    ->label('Proof')
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize('10240')
                    ->multiple()
                    ->openable()
                    ->downloadable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Name'),
                Tables\Columns\TextColumn::make('instansi.name')
                    ->searchable()
                    ->label('Instansi'),
                Tables\Columns\TextColumn::make('service.name')
                    ->searchable()
                    ->label('Service'),
                Tables\Columns\TextColumn::make('report')
                    ->searchable()
                    ->label('Laporan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                ActionsExportAction::make()->exporter(ReportExporter::class),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
