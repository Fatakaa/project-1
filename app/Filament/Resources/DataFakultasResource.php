<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataFakultasResource\Pages;
use App\Filament\Resources\DataFakultasResource\RelationManagers;
use App\Models\DataFakultas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataFakultasResource extends Resource
{
    protected static ?string $model = DataFakultas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Data Fakultas';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_fakultas')
                    ->label('Nama Fakultas'),
                TextInput::make('nama_fakultas_english')
                    ->label('Nama Fakultas (English)'),
                TextInput::make('nama_fakultas_singkatan')
                    ->label('Nama Singkatan Fakultas'),
                TextInput::make('alamat')
                    ->label('Alamat Fakultas'),
                TextInput::make('email')
                    ->label('Email Fakultas'),
                TextInput::make('website')
                    ->label('Website Fakultas')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('No.'),
                TextColumn::make('nama_fakultas')
                    ->label('Nama Fakultas'),
                TextColumn::make('nama_fakultas_english')
                    ->label('Nama Fakultas (English)'),
                TextColumn::make('nama_fakultas_singkatan')
                    ->label('Nama Singkatan Fakultas'),
                TextColumn::make('alamat')
                    ->label('Alamat Fakultas'),
                TextColumn::make('email')
                    ->label('Email Fakultas'),
                TextColumn::make('website')
                    ->label('Website Fakultas')
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
            'index' => Pages\ListDataFakultas::route('/'),
            'create' => Pages\CreateDataFakultas::route('/create'),
            'edit' => Pages\EditDataFakultas::route('/{record}/edit'),
        ];
    }
}
