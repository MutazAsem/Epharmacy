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
        return ['plate_number','vehicle_type','delivery_vehicle.delivery_id'];
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



                                Forms\Components\TextInput::make('plate_number')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->live()
                                    ->unique(VehicleDetail::class, 'plate_number', ignoreRecord: true)
                                    ->rules('numeric', 'min:0')
                                    ->minValue(0)
                                    ->maxLength(999999),
                                Forms\Components\Select::make('vehicle_type')
                                    ->unique(VehicleDetail::class, 'plate_number', ignoreRecord: true)
                                    ->required()
                                    ->markAsRequired(false)
                                    ->options(['Car' => 'Car', 'Truck' => 'Truck', 'Bus' => 'Bus', 'Taxi' => 'Taxi', 'Bicycle' => 'Bicycle', 'Motorcycle' => 'Motorcycle'])
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('delivery_id')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->relationship('delivery_vehicle', 'name')
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
                //
                Tables\Columns\TextColumn::make('plate_number')
                    ->label('Vehicle plate number')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('vehicle_type')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('delivery_vehicle.delivery_id')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('delivery vehicle name')
                    ->relationship('delivery_vehicle', 'name'),
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
