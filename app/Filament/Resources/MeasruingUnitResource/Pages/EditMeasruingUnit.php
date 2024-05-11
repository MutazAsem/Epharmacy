<?php

namespace App\Filament\Resources\MeasruingUnitResource\Pages;

use App\Filament\Resources\MeasruingUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMeasruingUnit extends EditRecord
{
    protected static string $resource = MeasruingUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
