<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataMahasiswaResource\Pages;
use App\Filament\Resources\DataMahasiswaResource\RelationManagers;
use App\Models\DataMahasiswa;
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

class DataMahasiswaResource extends Resource
{
    protected static ?string $model = DataMahasiswa::class;


    protected static ?string $navigationIcon = 'phosphor-student';

    protected static ?string $navigationLabel = 'Data Mahasiswa';

    protected static ?string $navigationGroup = 'Master Data';

    public static ?string $label = 'Data Mahasiswa';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                TextInput::make('nim')
                    ->label('NIM')
                    ->Required(),
                TextInput::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa')
                    ->Required(),
                // TextInput::make('fakultas')
                //     ->label('Fakultas')
                //     ->Required(),
                Select::make('jurusan_id')
                    ->relationship('jurusan', 'nama_jurusan')
                    ->label('Jurusan')
                    ->Required(),
                Select::make('konsentrasi_id')
                    ->relationship('konsentrasi', 'nama_konsentrasi')
                    ->label('Konsentrasi')
                    ->Required(),
                Select::make('keaktifan')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif'
                    ])
                    ->label('Status Aktif')
                    ->Required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),
                TextColumn::make('nama_mahasiswa'),
                TextColumn::make('jurusan.fakultas.nama_fakultas'),
                TextColumn::make('jurusan.nama_jurusan'),
                TextColumn::make('konsentrasi.nama_konsentrasi'),
                TextColumn::make('keaktifan')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Tidak Aktif' => 'danger',
                    })
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
            'index' => Pages\ListDataMahasiswas::route('/'),
            'create' => Pages\CreateDataMahasiswa::route('/create'),
            'edit' => Pages\EditDataMahasiswa::route('/{record}/edit'),
        ];
    }
}
