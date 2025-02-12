<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanResource\Pages;
use App\Filament\Resources\PengajuanResource\RelationManagers;
use App\Models\Pengajuan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;
use Symfony\Contracts\Service\Attribute\Required;

class PengajuanResource extends Resource
{
    protected static ?string $model = Pengajuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pengajuan';

    protected static ?string $navigationGroup = 'Surat Elektronik';
    
    public static ?string $label = 'Pengajuan';
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
                TextInput::make('fakultas')
                    ->label('Fakultas')
                    ->Required(),
                TextInput::make('prodi')
                    ->label('Program Studi')
                    ->Required(),
                Select::make('status')
                    ->options([
                        'suketBaik' => 'Surat Keterangan Berkelakuan Baik',
                        'suketNonBeasiswa' => 'Surat Tidak Menerima Beasiswa',
                        'suketAktif' => 'Surat Keterangan Aktif',
                    ])
                    ->label('Nama Surat')
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
                TextColumn::make('fakultas'),
                TextColumn::make('prodi'),
                TextColumn::make('nama_surat')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPengajuans::route('/'),
            'create' => Pages\CreatePengajuan::route('/create'),
            'edit' => Pages\EditPengajuan::route('/{record}/edit'),
        ];
    }
}
