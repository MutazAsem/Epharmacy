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

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->relationship('product_alternativ', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->markAsRequired(false)
                                    ->label('Product name'),
                                Forms\Components\Select::make('alternativ_product_id')
                                    ->relationship('alternativ_product', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->markAsRequired(false)
                                    ->label('Alternativ Product Name'),
                            ])
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_alternativ.name')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alternativ_product.name')
                    ->label('Alternativ Product Name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('Product Name')
                    ->relationship('product_alternativ', 'name'),
                Tables\Filters\SelectFilter::make('Alternativ product Name')
                    ->relationship('alternativ_product', 'name'),
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
            'index' => Pages\ListAlternativeProducts::route('/'),
            'create' => Pages\CreateAlternativeProduct::route('/create'),
            'edit' => Pages\EditAlternativeProduct::route('/{record}/edit'),
        ];
    }
}
