<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataKonsentrasiResource\Pages;
use App\Filament\Resources\DataKonsentrasiResource\RelationManagers;
use App\Models\DataKonsentrasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataKonsentrasiResource extends Resource
{
    protected static ?string $model = DataKonsentrasi::class;

    protected static ?string $navigationIcon = 'hugeicons-search-focus';

    protected static ?string $navigationLabel = 'Data Konsentrasi';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_konsentrasi')
                    ->label('Nama Konsentrasi')
                    ->Required(),
                TextInput::make('nama_konsentrasi_english')
                    ->label('Nama Konsentrasi (Inggris)')
                    ->Required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('No.'),
                TextColumn::make('nama_konsentrasi')
                ->label('Nama Konsentrasi'),
                TextColumn::make('nama_konsentrasi_english')
                ->label('Nama Konsentrasi (English)')
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataKonsentrasis::route('/'),
            'create' => Pages\CreateDataKonsentrasi::route('/create'),
            'edit' => Pages\EditDataKonsentrasi::route('/{record}/edit'),
        ];
    }
}
