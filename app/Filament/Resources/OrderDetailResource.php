<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderDetailResource\Pages;
use App\Filament\Resources\OrderDetailResource\RelationManagers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductMeasurementUnit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderDetailResource extends Resource
{
    protected static ?string $model = OrderDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()

                        ->schema([
                            Forms\Components\Select::make('order_id')->required()->options(Order::pluck('id')->toArray()),
                            Forms\Components\Select::make('product_id')->required()->options(Product::all()->pluck('name', 'id')->toArray()),
                            Forms\Components\Select::make('product_measurement_units_id')->required()->options(ProductMeasurementUnit::all()->pluck('name', 'id')->toArray()),
                        ])
                        ]),

                Forms\Components\Group::make()
                ->schema([

                    Forms\Components\Section::make()

                    ->schema([
                        Forms\Components\TextInput::make('total_quantity')->required()->minValue(0)->live()->numeric(),
                        Forms\Components\TextInput::make('total_product_price')->required()->minValue(0)->live()->numeric(),
                        Forms\Components\DateTimePicker::make('deleted_at')->date(),
                    ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('order_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('total_quantity')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product_measurement_units_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('total_product_price')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')->date()->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->date()->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')->date()->searchable()->sortable()->toggleable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('product measurement unit')
                ->relationship('order_product_measurement_unit' , 'name'),
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
            'index' => Pages\ListOrderDetails::route('/'),
            'create' => Pages\CreateOrderDetail::route('/create'),
            'edit' => Pages\EditOrderDetail::route('/{record}/edit'),
        ];
    }
}
