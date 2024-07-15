<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleDetailResource\Pages;
use App\Filament\Resources\VehicleDetailResource\RelationManagers;
use App\Models\User;
use App\Models\VehicleDetail;
use Doctrine\DBAL\Schema\Column;
use Filament\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehicleDetailResource extends Resource
{
    protected static ?string $model = VehicleDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Manage';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'plate_number';

    public static function getGloballySearchableAttributes(): array
    {
        return ['plate_number', 'vehicle_type', 'delivery_vehicle.delivery_id'];
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
                                Forms\Components\Select::make('delivery_id')
                                    ->label('Delivery Name')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->options(User::whereHas('roles', function ($query) {
                                        $query->where('name', 'delivery');
                                    })->pluck('name', 'id'))
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\TextInput::make('plate_number')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->live()
                                    ->unique(VehicleDetail::class, 'plate_number', ignoreRecord: true)
                                    ->minValue(0)
                                    ->maxLength(9999999),
                                Forms\Components\Select::make('vehicle_type')
                                    ->unique(VehicleDetail::class, 'plate_number', ignoreRecord: true)
                                    ->required()
                                    ->markAsRequired(false)
                                    ->options(['Car' => 'Car', 'Truck' => 'Truck', 'Bus' => 'Bus', 'Taxi' => 'Taxi', 'Bicycle' => 'Bicycle', 'Motorcycle' => 'Motorcycle'])
                                    ->preload(),
                            ])
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('delivery_vehicle.name')
                    ->label('Delivery Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('plate_number')
                    ->label('Vehicle plate number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vehicle_type')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('delivery vehicle name')
                    ->options(User::whereHas('roles', function ($query) {
                        $query->where('name', 'delivery');
                    })->pluck('name', 'id')),
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
            'index' => Pages\ListVehicleDetails::route('/'),
            'create' => Pages\CreateVehicleDetail::route('/create'),
            'edit' => Pages\EditVehicleDetail::route('/{record}/edit'),
        ];
    }
}
