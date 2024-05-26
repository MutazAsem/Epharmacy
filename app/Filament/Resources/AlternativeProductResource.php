<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlternativeProductResource\Pages;
use App\Filament\Resources\AlternativeProductResource\RelationManagers;
use App\Models\AlternativeProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlternativeProductResource extends Resource
{
    protected static ?string $model = AlternativeProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\Select::make('product_id')
                                ->relationship('product_alternativ','name')
                                ->searchable()
                                ->required(),
                            Forms\Components\Select::make('alternativ_product_id')
                                ->relationship('alternativ_product','name')
                                ->searchable()
                                ->required(),
                                ])

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_alternativ.name'),
                Tables\Columns\TextColumn::make('alternativ_product.name'),

                                ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                ->relationship('product_alternativ','name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAlternativeProducts::route('/'),
            'create' => Pages\CreateAlternativeProduct::route('/create'),
            'edit' => Pages\EditAlternativeProduct::route('/{record}/edit'),
        ];
    }
}
