<?php

namespace App\Filament\Resources\MeasruingUnitResource\Pages;

use App\Filament\Resources\MeasruingUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMeasruingUnits extends ListRecords
{
    protected static string $resource = MeasruingUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
