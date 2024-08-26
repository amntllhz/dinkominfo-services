<?php

namespace App\Filament\Resources;

use App\Filament\Actions\CustomViewAction;
use App\Filament\Resources\RequestSubmissionResource\Pages;
use App\Filament\Resources\RequestSubmissionResource\RelationManagers;
use App\Models\RequestSubmission;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
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
                            Forms\Components\Select::make('instansi_id')
                                ->label('Pilih Instansi')
                                ->relationship('instansi', 'name')
                                ->required(),
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
                                    Textarea::make('desc_name')
                                        ->label('Deskripsi Singkat Aplikasi')
                                        ->required()
                                        ->columnSpan(1),
                                    TextInput::make('site')
                                        ->label('Situs Aplikasi')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    TextInput::make('ip')
                                        ->label('IP Address (Opsional)')
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    FileUpload::make('document')
                                        ->label('Documents Aplikasi')
                                        ->openable()
                                        ->downloadable()
                                        ->required()
                                        ->columnSpan(1),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(fn(Get $get) => $get('service_id') == 3)
                                ->columnSpan('full'),

                            Group::make()
                                ->relationship('reqDetailVPSs')
                                ->schema([
                                    TextInput::make('purpose')
                                        ->label('Tujuan')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    TextInput::make('os')
                                        ->label('OS')
                                        ->required()
                                        ->columnSpan(1),
                                    TextInput::make('cpu')
                                        ->label('CPU')
                                        ->required()
                                        ->columnSpan(1),
                                    TextInput::make('ram')
                                        ->label('RAM')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    TextInput::make('storage')
                                        ->label('Storage')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    FileUpload::make('document')
                                        ->label('Documents Permohonan')
                                        ->openable()
                                        ->downloadable()
                                        ->required()
                                        ->columnSpan(1),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(fn(Get $get) => $get('service_id') == 1)
                                ->columnSpan('full'),

                            Group::make()
                                ->relationship('reqDetailHostings')
                                ->schema([
                                    TextInput::make('purpose')
                                        ->label('Tujuan')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    TextInput::make('storage')
                                        ->label('Storage')
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    FileUpload::make('document')
                                        ->label('Documents Permohonan')
                                        ->required()
                                        ->openable()
                                        ->downloadable()
                                        ->columnSpan(1),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(fn(Get $get) => $get('service_id') == 2)
                                ->columnSpan('full'),


                            Group::make()
                                ->relationship('reqDetailClearances')
                                ->schema([
                                    TextArea::make('purpose')
                                        ->label('Tujuan Pengadaan Clearance')
                                        ->required()
                                        ->maxLength(255),
                                    FileUpload::make('documents')
                                        ->label('Document Surat Permohonan, Proposal, dan Dokumen Pendukung')
                                        ->required()
                                        ->openable()
                                        ->downloadable()
                                        ->multiple(),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(fn(Get $get) => $get('service_id') == 4)
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
                    ->skippable()
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
                Tables\Columns\TextColumn::make('instansi.name')
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
                // Tables\Actions\Action::make('view')
                //     ->label('View')
                //     ->icon('heroicon-o-eye')
                //     ->form([])
                //     ->modalHeading('Detail View')
                //     ->modalContent(fn($record) => view('filament.view', [
                //         'record' => $record,
                //     ])),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('updateStatus')
                    ->label('Update Status')
                    ->icon('heroicon-o-pencil-square')
                    ->color('warning')
                    ->form(function (RequestSubmission $record) {
                        return [
                            Select::make('status')
                                ->label('Update Status')
                                ->options([
                                    'Pending' => 'Pending',
                                    'In Progress' => 'In Progress',
                                    'Rejected' => 'Rejected',
                                    'Completed' => 'Completed',
                                ])
                                ->default($record->status)
                                ->required(),
                            Textarea::make('message')
                                ->label('Pesan Terkait Perubahan')
                                ->placeholder('Masukkan pesan terkait perubahan status')
                                ->default($record->message),
                        ];
                    })
                    ->action(function (RequestSubmission $record, array $data): void {
                        $record->update([
                            'status' => $data['status'],
                            'message' => $data['message'],
                        ]);
                    })
                    ->modalHeading('Update Status Pengajuan')
                    ->modalDescription('Status dan pesan saat ini ditampilkan di atas. Pilih status baru dan tambahkan pesan jika diperlukan.')
                    ->modalSubmitActionLabel('Simpan Perubahan')
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
