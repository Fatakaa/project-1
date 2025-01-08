<?php

namespace App\Filament\Resources\DataJurusanResource\Pages;

use App\Filament\Resources\DataJurusanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataJurusans extends ListRecords
{
    protected static string $resource = DataJurusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
