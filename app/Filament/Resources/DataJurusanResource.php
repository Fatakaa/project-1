<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataJurusanResource\Pages;
use App\Filament\Resources\DataJurusanResource\RelationManagers;
use App\Models\DataJurusan;
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

class DataJurusanResource extends Resource
{
    protected static ?string $model = DataJurusan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_jurusan')
                ->label('Nama Jurusan'),
                TextInput::make('nama_jurusan_english')
                ->label('Nama Jurusan (English)'),
                TextInput::make('nama_program_studi')
                ->label('Nama Program Studi '),
                Select::make('fakultas_id')
                    ->relationship('fakultas', 'nama_fakultas')
                    ->label('Fakultas')
                    ->Required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('No.'),
                TextColumn::make('nama_jurusan')
                ->label('Nama Jurusan'),
                TextColumn::make('nama_jurusan_english')
                ->label('Nama Jurusan (English)'),
                TextColumn::make('nama_program_studi')
                ->label('Nama Program Studi '),
                TextColumn::make('fakultas.nama_fakultas')
                ->label('Fakultas')

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
            'index' => Pages\ListDataJurusans::route('/'),
            'create' => Pages\CreateDataJurusan::route('/create'),
            'edit' => Pages\EditDataJurusan::route('/{record}/edit'),
        ];
    }
}
