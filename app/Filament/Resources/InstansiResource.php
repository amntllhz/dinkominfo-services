<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstansiResource\Pages;
use App\Filament\Resources\InstansiResource\RelationManagers;
use App\Models\Instansi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Instansi')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label('Alamat Instansi')
                    ->required(),
                Forms\Components\Select::make('sector')
                    ->label('Sektor')
                    ->options([
                        'Dinas Daerah' => 'Dinas Daerah',
                        'Badan Daerah' => 'Badan Daerah',
                        'Kecamatan' => 'Kecamatan',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Telepon')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Instansi'),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->label('Alamat Instansi'),
                Tables\Columns\TextColumn::make('sector')
                    ->searchable()
                    ->sortable()
                    ->label('Bidang'),
            ])
            ->filters([
                SelectFilter::make('sector')
                    ->label('Bidang')
                    ->multiple()
                    ->options([
                        'Badan Daerah' => 'Badan Daerah',
                        'Dinas Daerah' => 'Dinas Daerah',
                        'Kecamatan' => 'Kecamatan',
                    ])
            ])
            ->actions([
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

    public static function getLabel(): string
    {
        return 'Instansi';
    }

    public static function getPluralLabel(): string
    {
        return 'Instansi';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstansis::route('/'),
            'create' => Pages\CreateInstansi::route('/create'),
            'edit' => Pages\EditInstansi::route('/{record}/edit'),
        ];
    }
}
