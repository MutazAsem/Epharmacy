<?php

namespace App\Filament\Resources\AlternativeProductResource\Pages;

use App\Filament\Resources\AlternativeProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlternativeProducts extends ListRecords
{
    protected static string $resource = AlternativeProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
