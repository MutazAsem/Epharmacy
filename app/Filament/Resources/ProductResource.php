<?php

namespace App\Filament\Resources;

use App\Enums\CountryEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Resources\ProductResource\RelationManagers\ProductMeasuremenRelationManager;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;



class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'description', 'manufacture_company', 'effective_material'];
    }

    protected static int $globalSearchResultsLimit = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Basic Information')
                            ->icon('heroicon-m-inbox-arrow-down')
                            ->schema([
                                Forms\Components\TextInput::make('name'),
                                Forms\Components\Select::make('made_in')
                                    ->options(CountryEnum::class)
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\TextInput::make('manufacture_company'),
                                Forms\Components\TextInput::make('type'),
                                Forms\Components\TextInput::make('effective_material'),
                                Forms\Components\Select::make('category_id')
                                    ->relationship('product_category', 'name')
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Textarea::make('description')
                                    ->rows(3),
                                Forms\Components\FileUpload::make('image')
                                    ->directory('products_images')
                                    ->imageEditor(),
                                Forms\Components\Toggle::make('status'),
                            ]),
                        Tabs\Tab::make('Additional Information')
                            ->icon('heroicon-m-inbox-stack')
                            ->schema([
                                Forms\Components\Textarea::make('indications'),
                                Forms\Components\Textarea::make('dosage'),
                                Forms\Components\Textarea::make('side_effects'),
                                Forms\Components\Textarea::make('contraindications'),
                                Forms\Components\Textarea::make('packaging'),
                                Forms\Components\Textarea::make('storage'),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('product_category.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('made_in')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('manufacture_company')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('effective_material')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('indications')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('dosage')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('side_effects')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('contraindications')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('packaging')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('storage')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('categories')
                    ->relationship('product_category', 'name'),
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
            ProductMeasuremenRelationManager::class
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
