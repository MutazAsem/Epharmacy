<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductMeasurementUnitResource\Pages;
use App\Filament\Resources\ProductMeasurementUnitResource\RelationManagers;
use App\Models\MeasruingUnit;
use App\Models\Product;
use App\Models\ProductMeasurementUnit;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductMeasurementUnitResource extends Resource
{
    protected static ?string $model = ProductMeasurementUnit::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'price';

    public static function getGloballySearchableAttributes(): array
    {
        return ['quantity', 'price'];
    }

    protected static int $globalSearchResultsLimit = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->label('Product Name')
                                    ->searchable()
                                    ->preload()
                                    ->relationship('product_measuremen', 'name'),
                                Forms\Components\Select::make('measurement_units_id')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->label('Measurement Unit Name')
                                    ->relationship('product_unit', 'name'),
                                Forms\Components\TextInput::make('quantity')
                                    ->required()
                                    ->markAsRequired(false),
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->numeric()
                                    ->minValue(0),
                            ])->columns(2)
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('product_measuremen.name')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_unit.name')
                    ->label('Measurement Unit Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('Product Name')
                    ->relationship('product_measuremen', 'name'),
                Tables\Filters\SelectFilter::make('Measurement Unit')
                    ->relationship('product_unit', 'name'),
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
            'index' => Pages\ListProductMeasurementUnits::route('/'),
            'create' => Pages\CreateProductMeasurementUnit::route('/create'),
            'edit' => Pages\EditProductMeasurementUnit::route('/{record}/edit'),
        ];
    }
}
