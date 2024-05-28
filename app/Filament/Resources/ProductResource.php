<?php

namespace App\Filament\Resources;

use App\Enums\CountryEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;



class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\TextInput::make('name'),
                            Forms\Components\TextInput::make('description'),
                            Forms\Components\Select::make('made_in')
                            ->options(CountryEnum::class)
                            ->searchable()
                            ->preload(),
                            Forms\Components\TextInput::make('manufacture_company'), 
                            Forms\Components\TextInput::make('type'), 
                            Forms\Components\TextInput::make('effective_material'), 
                            Forms\Components\TextInput::make('indications'), 
                        ])
                ]),

                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\Select::make('category_id')
                            ->relationship('product_category','name')
                            ->searchable()
                            ->preload(),
                            Forms\Components\TextInput::make('dosage'),
                            Forms\Components\TextInput::make('side_effects'),
                            Forms\Components\TextInput::make('contraindications'),
                            Forms\Components\TextInput::make('packaging'),
                            Forms\Components\TextInput::make('storage'),
                            Forms\Components\Toggle::make('status'),  
                        ]),

                    Forms\Components\Section::make('Image')
                        ->schema([
                            Forms\Components\FileUpload::make('image')  
                        ])->collapsible()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('product_category.name'),
                Tables\Columns\TextColumn::make('made_in'),
                Tables\Columns\TextColumn::make('manufacture_company'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('effective_material'),
                Tables\Columns\TextColumn::make('indications'),
                Tables\Columns\TextColumn::make('dosage'),
                Tables\Columns\TextColumn::make('side_effects'),
                Tables\Columns\TextColumn::make('contraindications'),
                Tables\Columns\TextColumn::make('packaging'),
                Tables\Columns\TextColumn::make('storage'),
                Tables\Columns\IconColumn::make('status')->boolean()




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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
