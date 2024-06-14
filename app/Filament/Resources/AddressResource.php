<?php

namespace App\Filament\Resources;

use App\Enums\CityEnum;
use Filament\Tables\Columns\TextColumn;
use PhpParser\Node\Expr\Ternary;
use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->live(onBlur: true),

                                Forms\Components\TextInput::make('description')
                                    ->required()
                                    ->markAsRequired(false),

                                Forms\Components\Select::make('city')
                                    ->options(CityEnum::class)
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->markAsRequired(false),

                                Forms\Components\TextInput::make('address_link')
                                    ->label('Address Link')
                                    ->required()
                                    ->markAsRequired(false),

                                Forms\Components\Select::make('user_id')
                                    ->relationship('user_address', 'name')
                                    ->label('Clint Name')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->searchable()
                                    ->preload(),

                            ])
                    ])->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Address Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('address_link')
                    ->label('Address Link')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user_address.name')
                    ->label('Clint Name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user name')
                    ->relationship('user_address', 'name'),
                Tables\Filters\SelectFilter::make('city')
                    ->options(CityEnum::class),
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
