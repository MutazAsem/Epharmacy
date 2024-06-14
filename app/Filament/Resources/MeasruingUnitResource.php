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

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()

                            ->schema([
                                forms\Components\TextInput::make('name')
                                    ->label('Measruing Unit Name')
                                    ->required()
                                    ->markAsRequired(false),
                            ])


                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Measruing Unit Name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])

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
