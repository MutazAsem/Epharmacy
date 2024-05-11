<?php

namespace App\Filament\Resources\AlternativeProductResource\Pages;

use App\Filament\Resources\AlternativeProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlternativeProduct extends EditRecord
{
    protected static string $resource = AlternativeProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
