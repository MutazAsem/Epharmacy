<?php

namespace App\Filament\Resources\ProductMeasurementUnitResource\Pages;

use App\Filament\Resources\ProductMeasurementUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductMeasurementUnits extends ListRecords
{
    protected static string $resource = ProductMeasurementUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
