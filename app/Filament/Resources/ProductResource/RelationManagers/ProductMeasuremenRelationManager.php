<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductMeasuremenRelationManager extends RelationManager
{
    protected static string $relationship = 'product_measuremen';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()

                            ->schema([


                                Forms\Components\Select::make('measurement_units_id')
                                    ->required()
                                    ->label('Measurement Unit Name')
                                    ->markAsRequired(false)
                                    ->relationship('product_unit', 'name')
                                    ->columnSpanFull(),

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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('price')
            ->columns([
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
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([

                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
