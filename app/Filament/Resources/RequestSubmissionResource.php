<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestSubmissionResource\Pages;
use App\Filament\Resources\RequestSubmissionResource\RelationManagers;
use App\Models\RequestSubmission;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestSubmissionResource extends Resource
{
    protected static ?string $model = RequestSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Data Pengaju')
                        ->schema([
                            Forms\Components\TextInput::make('applicant')
                                ->label('Nama Pemohon')
                                ->required()
                                ->placeholder('Masukkan nama lengkap')
                                ->columnSpan(1),
                            Forms\Components\TextInput::make('instansi')
                                ->label('Instansi')
                                ->required()
                                ->placeholder('Masukkan instansi')
                                ->columnSpan(1),
                            Forms\Components\TextInput::make('email')
                                ->label('Email')
                                ->required()
                                ->placeholder('Masukkan email')
                                ->columnSpan(1),
                            Forms\Components\TextInput::make('phone')
                                ->label('Nomor Telepon')
                                ->required()
                                ->placeholder('Masukkan nomor telepon')
                                ->columnSpan(1),
                        ]),
                    Forms\Components\Wizard\Step::make('Pilih Layanan')
                        ->schema([
                            Forms\Components\Select::make('service_id')
                                ->label('Layanan')
                                ->relationship('service', 'name')
                                ->required(),
                        ]),

                    Forms\Components\Wizard\Step::make('Form Pengajuan')
                        ->schema([
                            Group::make()
                                ->relationship('reqDetailDomains')
                                ->schema([
                                    TextInput::make('app_name')
                                        ->label('Nama Aplikasi')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    TextInput::make('domain_name')
                                        ->label('Situs Aplikasi')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    FileUpload::make('document')
                                        ->label('Documents Aplikasi')
                                        ->required()
                                        ->columnSpan(1),
                                ])
                                ->visible(fn(Get $get) => $get('service_id') == 1)
                                ->columnSpan('full'),
                            Group::make()
                                ->relationship('reqDetailClearances')
                                ->schema([
                                    TextInput::make('purpose')
                                        ->label('Tujuan Pengadaan Clearance')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('clearance_name')
                                        ->label('Perangkat Clearance')
                                        ->required()
                                        ->maxLength(255),
                                    FileUpload::make('document')
                                        ->label('Documents Aplikasi')
                                        ->required(),
                                ])
                                ->visible(fn(Get $get) => $get('service_id') == 2)
                                ->columnSpan('full'),

                        ]),
                    Forms\Components\Wizard\Step::make('Admin Approval')
                        ->schema([
                            Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'Pending' => 'Pending',
                                    'In Progress' => 'In Progress',
                                    'Rejected' => 'Rejected',
                                    'Completed' => 'Completed',
                                ])
                                ->default('Pending')
                                ->required(),
                            Forms\Components\Textarea::make('message')
                                ->label('Pesan')
                                ->placeholder('Masukkan pesan'),
                        ])
                ])
                    ->columns(2)
                    ->columnSpan('full')
                // Forms\Components\TextInput::make('name')
                //     ->label('Nama')
                //     ->required()
                //     ->placeholder('Masukkan nama lengkap')
                //     ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('applicant')
                    ->label('Pemohon')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('instansi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('receipt')
                    ->searchable()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRequestSubmissions::route('/'),
            'create' => Pages\CreateRequestSubmission::route('/create'),
            'edit' => Pages\EditRequestSubmission::route('/{record}/edit'),
        ];
    }
}
