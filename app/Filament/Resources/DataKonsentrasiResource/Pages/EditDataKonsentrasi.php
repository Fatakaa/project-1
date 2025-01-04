<?php

namespace App\Filament\Resources\DataKonsentrasiResource\Pages;

use App\Filament\Resources\DataKonsentrasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataKonsentrasi extends EditRecord
{
    protected static string $resource = DataKonsentrasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
