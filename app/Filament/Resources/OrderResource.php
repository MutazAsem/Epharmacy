<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Address;
use App\Models\MeasruingUnit;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductMeasurementUnit;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 0;

    protected static ?string $recordTitleAttribute = 'id';

    public static function getGloballySearchableAttributes(): array
    {
        return ['id', 'total_price', 'client_order.name'];
    }

    protected static int $globalSearchResultsLimit = 5;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Wizard::make([

                    Forms\Components\Wizard\Step::make('Order Items')
                        ->schema([
                            Forms\Components\Repeater::make('order_item')
                                ->relationship()
                                ->schema([
                                    Forms\Components\Select::make('product_id')
                                        ->options(Product::pluck('name', 'id'))
                                        ->required()
                                        ->markAsRequired(false)
                                        ->searchable()
                                        ->preload()
                                        ->live()
                                        ->label('Product Name')
                                        ->afterStateUpdated(function ($state, callable $set) {
                                            $set('measurement_units_id', null);
                                            $set('total_product_price', null);
                                            $set('unit_price', null);
                                        }),
                                    Forms\Components\Select::make('measurement_units_id')
                                        ->options(function (Forms\Get $get) {
                                            $productId = $get('product_id');
                                            if ($productId) {
                                                return MeasruingUnit::whereHas('products', function ($query) use ($productId) {
                                                    $query->where('product_id', $productId);
                                                })->pluck('name', 'id');
                                            }
                                            return [];
                                        })
                                        ->live()
                                        ->disabled(fn (Forms\Get $get): bool => !filled($get('product_id')))
                                        ->afterStateUpdated(function ($state, callable $set, Forms\Get $get) {
                                            $productId = $get('product_id');
                                            if ($productId && $state) {
                                                $productMeasurementUnit = ProductMeasurementUnit::where('product_id', $productId)
                                                    ->where('measurement_units_id', $state)
                                                    ->first();
                                                if ($productMeasurementUnit) {
                                                    $unitPrice = $productMeasurementUnit->price;
                                                    $set('unit_price', $unitPrice);

                                                    // احصل على الكمية الحالية أو الافتراضية 1
                                                    $quantity = $get('quantity') ?? 1;
                                                    $set('total_product_price', $unitPrice * $quantity);
                                                }
                                            }
                                        })
                                        ->required()
                                        ->markAsRequired(false)
                                        ->label('Product Measurement Units')
                                        ->preload(),
                                    Forms\Components\TextInput::make('quantity')
                                        ->label('Quantity')
                                        ->required()
                                        ->markAsRequired(false)
                                        ->minValue(1)
                                        ->live()
                                        ->default(1)
                                        ->afterStateUpdated(function ($state, callable $set, Forms\Get $get) {
                                            $unitPrice = $get('unit_price') ?? 0;
                                            $set('total_product_price', $unitPrice * $state);
                                        })
                                        ->numeric(),
                                    Forms\Components\TextInput::make('unit_price')
                                        ->label('Unit Price')
                                        ->required()
                                        ->markAsRequired(false)
                                        ->afterStateUpdated(function ($state, callable $set, Forms\Get $get) {
                                            $quantity = $get('quantity') ?? 1; // استخدم القيمة الافتراضية 1 إذا لم تكن محددة
                                            $set('total_product_price', $quantity * $state);
                                        })
                                        ->minValue(0),
                                    Forms\Components\TextInput::make('total_product_price')
                                        ->required()
                                        ->markAsRequired(false)
                                        ->minValue(0)
                                        ->live(),
                                ])->columns(5)
                        ]),
                    Forms\Components\Wizard\Step::make('Order Details')
                        ->schema([
                            Forms\Components\Select::make('client_id')
                                ->required()
                                ->markAsRequired(false)
                                ->label('Client name')
                                ->relationship('client_order', 'name')
                                ->live(),
                            Forms\Components\Select::make('address_id')
                                ->options(fn (Forms\Get $get) => Address::where('user_id', $get('client_id'))
                                    ->pluck('name', 'id'))
                                ->disabled(fn (Forms\Get $get): bool => !filled($get('client_id')))
                                ->required()
                                ->markAsRequired(false)
                                ->label('Address name'),
                            Forms\Components\Select::make('delivery_id')
                                ->required()
                                ->markAsRequired(false)
                                ->label('Delivery name')
                                ->options(User::whereHas('roles', function ($query) {
                                    $query->where('name', 'delivery');
                                })->pluck('name', 'id')),
                            Forms\Components\ToggleButtons::make('status')
                                ->required()
                                ->markAsRequired(false)->options(OrderStatusEnum::class)
                                ->icons([
                                    'New' => 'heroicon-o-sparkles',
                                    'Processing' => 'heroicon-o-arrow-path',
                                    'Shipped' => 'heroicon-o-truck',
                                    'Delivered' => 'heroicon-o-check-circle',
                                    'Cancelled' => 'heroicon-o-x-circle',
                                ])
                                ->colors([
                                    'New' => 'info',
                                    'Processing' => 'warning',
                                    'Shipped' => 'warning',
                                    'Delivered' => 'success',
                                    'Cancelled' => 'danger',
                                ])
                                ->inline()
                                ->default('New'),
                            Placeholder::make('total_price')
                                ->label('Total Price')
                                ->content(function (Get $get, Set $set) {
                                    $totalPrice = 0;
                                    if (!$repeaters = $get('order_item')) {
                                        return $totalPrice;
                                    }

                                    foreach ($repeaters as $key => $repeater) {
                                        $totalPrice +=  $get("order_item.{$key}.total_product_price");
                                    }
                                    $set('total_price', $totalPrice);
                                    return $totalPrice;
                                }),
                            Hidden::make('total_price')
                                ->default(0),
                            Forms\Components\ToggleButtons::make('payment_method')
                                ->required()
                                ->markAsRequired(false)->options([
                                    'Paiement when recieving' => 'Paiement when recieving',
                                    'Payment via wallet' => 'Payment via wallet'
                                ])
                                ->icons([
                                    'Paiement when recieving' => 'heroicon-o-currency-dollar',
                                    'Payment via wallet' => 'heroicon-o-wallet'
                                ])
                                ->colors([
                                    'Paiement when recieving' => 'success',
                                    'Payment via wallet' => 'info'
                                ])
                                ->default('Paiement when recieving')->inline(),

                            Forms\Components\Textarea::make('note')
                                ->rows(2)
                                ->columnSpanFull(),
                        ])->columns(2),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')
                    ->label('Order ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_order.name')
                    ->label('Client Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options(OrderStatusEnum::class)
                    ->label('Status of order')
                    ->searchable()
                    ->sortable()
                    ->selectablePlaceholder(false),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_address.name')
                    ->searchable()
                    ->label('Address name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_price')
                    ->searchable()
                    ->sortable()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('order_delivery.name')
                    ->searchable()
                    ->label('Delivery name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('note')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('clint name')
                    ->relationship('client_order', 'name'),

                Tables\Filters\SelectFilter::make('delivery name')
                    ->relationship('order_delivery', 'name'),


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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
