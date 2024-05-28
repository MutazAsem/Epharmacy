<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductMeasurementUnitResource\Pages;
use App\Filament\Resources\ProductMeasurementUnitResource\RelationManagers;
use App\Models\MeasruingUnit;
use App\Models\Product;
use App\Models\ProductMeasurementUnit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductMeasurementUnitResource extends Resource
{
    protected static ?string $model = ProductMeasurementUnit::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()

                        ->schema([

                            Forms\Components\TextInput::make('name')->required()->unique(ProductMeasurementUnit::class,'name',ignoreRecord:true),
                            Forms\Components\TextInput::make('quantity')->required()->numeric()->minValue(0),
                            Forms\Components\TextInput::make('price')->required()->numeric()->minValue(0),
                        ])
                        
                        ]),

                 Forms\Components\Group::make()
                     ->schema([

                        Forms\Components\Section::make()

                        ->schema([

                            Forms\Components\Select::make('measurement_units_id')
                            ->required()
                            ->options(MeasruingUnit::all()
                            ->pluck('name','id')
                            ->toArray())
                            ->searchable()
                            ->preload(),
                            Forms\Components\Select::make('product_id')
                            ->required()->options(Product::all()
                            ->pluck('name', 'id')
                            ->toArray())
                            ->searchable()
                            ->preload(),
                        ])->columns(2)
                        
                        ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('measurement_units_id')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('product_id')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('quantity')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('price')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->searchable()->sortable()->toggleable()->date(),
                Tables\Columns\TextColumn::make('updated_at')->searchable()->sortable()->toggleable()->date(),
            ])
            ->filters([
                //
                // Tables\Filters\SelectFilter::make('product measuremen')
                // ->relationship('product_measuremen' , 'name')  
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
