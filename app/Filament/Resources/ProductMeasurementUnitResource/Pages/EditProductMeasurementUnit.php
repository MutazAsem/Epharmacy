<?php

namespace App\Filament\Resources\ProductMeasurementUnitResource\Pages;

use App\Filament\Resources\ProductMeasurementUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductMeasurementUnit extends EditRecord
{
    protected static string $resource = ProductMeasurementUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
