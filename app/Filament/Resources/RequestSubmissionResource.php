<?php

namespace App\Filament\Resources;

use App\Filament\Actions\CustomViewAction;
use App\Filament\Resources\RequestSubmissionResource\Pages;
use App\Filament\Resources\RequestSubmissionResource\RelationManagers;
use App\Mail\UpdateStatusMail;
use App\Models\RequestSubmission;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

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
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $slug = \App\Models\Service::find($state)?->slug;
                                    $set('service_slug', $slug);
                                }),
                            Forms\Components\Hidden::make('service_slug')
                                ->reactive(),
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
                                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                        ->maxSize('10240')
                                        ->required()
                                        ->columnSpan(1),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(
                                    fn(Get $get, $record) =>
                                    $record
                                        ? str_contains(strtolower($record->service->slug), 'domain')
                                        : str_contains(strtolower($get('service_slug')), 'domain')
                                )
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

                                    Select::make('cpu')
                                        ->label('Ukuran CPU')
                                        ->options([
                                            '2 Core' => '2 Core',
                                            '4 Core' => '4 Core',
                                            '8 Core' => '8 Core',
                                        ])
                                        ->required()
                                        ->columnSpan(1),
                                    Select::make('storage')
                                        ->label('Ukuran Storage')
                                        ->options([
                                            '100 GB' => '100 GB',
                                            '200 GB' => '200 GB',
                                            '400 GB' => '400 GB',
                                        ])
                                        ->required()
                                        ->columnSpan(1),
                                    Select::make('ram')
                                        ->label('Ukuran RAM')
                                        ->options([
                                            '2 GB' => '2 GB',
                                            '4 GB' => '4 GB',
                                            '8 GB' => '8 GB',
                                            '16 GB' => '16 GB',
                                            '32 GB' => '32 GB',
                                        ])
                                        ->required()
                                        ->columnSpan(1),

                                    FileUpload::make('document')
                                        ->label('Documents Permohonan')
                                        ->openable()
                                        ->downloadable()
                                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                        ->maxSize('10240')
                                        ->required()
                                        ->columnSpan(1),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(
                                    fn(Get $get, $record) =>
                                    $record
                                        ? str_contains(strtolower($record->service->slug), 'vps')
                                        : str_contains(strtolower($get('service_slug')), 'vps')
                                )
                                ->columnSpan('full'),

                            Group::make()
                                ->relationship('reqDetailHostings')
                                ->schema([
                                    TextInput::make('purpose')
                                        ->label('Tujuan')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    Select::make('cpu')
                                        ->label('Ukuran CPU')
                                        ->options([
                                            '2 Core' => '2 Core',
                                            '4 Core' => '4 Core',
                                            '8 Core' => '8 Core',
                                        ])
                                        ->required()
                                        ->columnSpan(1),
                                    Select::make('storage')
                                        ->label('Ukuran Storage')
                                        ->options([
                                            '100 GB' => '100 GB',
                                            '200 GB' => '200 GB',
                                            '400 GB' => '400 GB',
                                        ])
                                        ->required()
                                        ->columnSpan(1),
                                    Select::make('ram')
                                        ->label('Ukuran RAM')
                                        ->options([
                                            '2 GB' => '2 GB',
                                            '4 GB' => '4 GB',
                                            '8 GB' => '8 GB',
                                            '16 GB' => '16 GB',
                                            '32 GB' => '32 GB',
                                        ])
                                        ->required()
                                        ->columnSpan(1),
                                    FileUpload::make('document')
                                        ->label('Documents Permohonan')
                                        ->required()
                                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                        ->maxSize('10240')
                                        ->openable()
                                        ->downloadable()
                                        ->columnSpan(1),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(
                                    fn(Get $get, $record) =>
                                    $record
                                        ? str_contains(strtolower($record->service->slug), 'hosting')
                                        : str_contains(strtolower($get('service_slug')), 'hosting')
                                )
                                ->columnSpan('full'),


                            Group::make()
                                ->relationship('reqDetailClearances')
                                ->schema([
                                    TextInput::make('title_req')
                                        ->label('Judul Permohonan')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(1),
                                    TextArea::make('purpose')
                                        ->label('Tujuan Pengadaan Clearance')
                                        ->required()
                                        ->maxLength(255),
                                    FileUpload::make('documents')
                                        ->label('Document Surat Permohonan, Proposal, dan Dokumen Pendukung')
                                        ->required()
                                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                        ->maxSize('10240')
                                        ->openable()
                                        ->downloadable()
                                        ->multiple(),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(
                                    fn(Get $get, $record) =>
                                    $record
                                        ? str_contains(strtolower($record->service->slug), 'clearance')
                                        : str_contains(strtolower($get('service_slug')), 'clearance')
                                )
                                ->columnSpan('full'),

                            Group::make()
                                ->relationship('reqDetailOthers')
                                ->schema([
                                    TextArea::make('purpose')
                                        ->label('Tujuan Pengadaan Clearance')
                                        ->required()
                                        ->maxLength(255),
                                    FileUpload::make('documents')
                                        ->label('Document Permohonan')
                                        ->required()
                                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                        ->maxSize('10240')
                                        ->openable()
                                        ->downloadable()
                                        ->multiple(),
                                    Textarea::make('add_inform')
                                        ->label('Keterangan Lainnya')
                                        ->columnSpan(1),
                                ])
                                ->visible(function (Get $get, $record = null) {
                                    $slug = $record ? ($record->service->slug ?? '') : ($get('service_slug') ?? '');
                                    $slug = strtolower($slug);
                                    $services = ['vps', 'domain', 'hosting', 'clearance'];

                                    // Mengembalikan true jika slug TIDAK mengandung salah satu dari layanan yang disebutkan
                                    return !collect($services)->contains(function ($service) use ($slug) {
                                        return str_contains($slug, $service);
                                    });
                                })
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
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pengajuan')
                    ->searchable()
                    ->sortable(),
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
                Tables\Columns\TextColumn::make('receipt')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable(),

            ])
            ->defaultSort('created_at', 'desc')
            ->filters([

                SelectFilter::make('period')
                    ->options([
                        'today' => 'Hari ini',
                        'this_week' => 'Minggu ini',
                        'this_month' => 'Bulan ini',
                    ])
                    ->query(function (Builder $query, string $value = null): Builder {
                        if ($value === null) {
                            return $query; // No filter applied
                        }

                        switch ($value) {
                            case 'today':
                                return $query->whereDate('created_at', Carbon::today());
                            case 'this_week':
                                return $query->whereBetween('created_at', [
                                    Carbon::now()->startOfWeek(),
                                    Carbon::now()->endOfWeek(),
                                ]);
                            case 'this_month':
                                return $query->whereBetween('created_at', [
                                    Carbon::now()->startOfMonth(),
                                    Carbon::now()->endOfMonth(),
                                ]);
                            default:
                                return $query; // Fallback if an unknown value is selected
                        }
                    })
                    ->label('Filter Periodik'),

                SelectFilter::make('status')
                    ->label('Status')
                    ->multiple()
                    ->options([
                        'Pending' => 'Pending',
                        'In Progress' => 'In Progress',
                        'Rejected' => 'Rejected',
                        'Completed' => 'Completed',
                    ]),

                // SelectFilter::make('service_id')
                //     ->label('Layanan')
                //     ->relationship('service', 'name')
                //     ->multiple(),

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
                        Mail::to($record->email)->send(new UpdateStatusMail(
                            [
                                'name' => $record->applicant,
                                'service' => $record->service->name,
                                'receipt' => $record->receipt,
                                'status' => $data['status'],
                                'message' => $data['message'],
                            ]
                        ));
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
