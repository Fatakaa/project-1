<?php

namespace App\Filament\Resources\DataKonsentrasiResource\Pages;

use App\Filament\Resources\DataKonsentrasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataKonsentrasis extends ListRecords
{
    protected static string $resource = DataKonsentrasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
