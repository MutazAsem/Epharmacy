<?php

namespace App\Filament\Resources;

use App\Enums\CityEnum;
use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Expr\Ternary;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                    ->schema([
                        forms\Components\TextInput::make('name')
                                ->required()
                                ->live(onBlur:true),
                        forms\Components\TextInput::make('description')
                                ->required(),
                        Forms\Components\Select::make('city')->options(CityEnum::class)
                                ->searchable(),
                        forms\Components\TextInput::make('address_link')
                                ->required(),
                        forms\Components\Select::make('user_id')
                                ->relationship('user_address','name')
                                ->label('user_name')
                                ->required()
                                ->searchable(),
                               
                    ])
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                        ->label('Address Name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('address_link'),
                Tables\Columns\TextColumn::make('user_address.name'),
                       
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                ->relationship('user_address','name'),
                
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
