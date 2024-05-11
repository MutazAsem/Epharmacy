<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeasruingUnitResource\Pages;
use App\Filament\Resources\MeasruingUnitResource\RelationManagers;
use App\Models\MeasruingUnit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeasruingUnitResource extends Resource
{
    protected static ?string $model = MeasruingUnit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeasruingUnits::route('/'),
            'create' => Pages\CreateMeasruingUnit::route('/create'),
            'edit' => Pages\EditMeasruingUnit::route('/{record}/edit'),
        ];
    }
}
