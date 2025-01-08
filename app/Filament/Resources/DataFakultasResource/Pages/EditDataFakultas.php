<?php

namespace App\Filament\Resources\DataFakultasResource\Pages;

use App\Filament\Resources\DataFakultasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataFakultas extends EditRecord
{
    protected static string $resource = DataFakultasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
