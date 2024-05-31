<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()

                          ->schema([
                            Forms\Components\Select::make('client_id')
                            ->required()
                            ->label('Client name')
                            ->relationship('user_order','name'),
                            
                            Forms\Components\Select::make('address_id')
                            ->required()
                            ->label('Address name')
                            ->relationship('order_address','name'),
                            
                            Forms\Components\Select::make('delivery_id')
                            ->required()
                            ->label('Delivery name')
                            ->relationship('order_delivery','name'),

                            Forms\Components\TextInput::make('note')
                            ->columnSpanFull()
                            ->required(),
                            
                        ])->columns(2)  
                        
                        ]),

                        Forms\Components\Group::make()
                            ->schema([

                        Forms\Components\Section::make()

                            ->schema([
                                Forms\Components\ToggleButtons::make('status')
                                ->required()
                                ->options(OrderStatusEnum::class)
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
                                    'Shipped' => 'success',
                                    'Delivered' => 'success',
                                    'Cancelled' => 'danger',
                                ])->inline(),
                                
                                Forms\Components\ToggleButtons::make('payment_method')
                                ->required()
                                ->options(['Paiement when recieving'=>'Paiement when recieving',
                                'Payment via wallet'=>'Payment via wallet'
                                ])
                                ->icons(['Paiement when recieving'=>'heroicon-o-currency-dollar',
                                'Payment via wallet'=>'heroicon-o-wallet'
                                ])
                                ->colors(['Paiement when recieving'=>'success',
                                'Payment via wallet'=>'info'
                                ]),
                                
                                Forms\Components\TextInput::make('total_price')
                                ->required()
                                ->numeric()
                                ->minValue(0),
                                
                        ])
                        
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('client_id')
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
                ->sortable(),
                
                Tables\Columns\TextColumn::make('total_price')
                ->searchable()
                ->sortable(),
                
                Tables\Columns\TextColumn::make('order_delivery.name')
                ->searchable()
                ->label('Delivery name')
                ->sortable(),
                
                Tables\Columns\TextColumn::make('note')
                ->searchable()
                ->sortable()
                ->toggleable(),
                
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->searchable()
                ->sortable()
                ->toggleable(),
                
                Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->searchable()
                ->sortable()
                ->toggleable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('clint name')
                ->relationship('user_order' , 'name'),

                Tables\Filters\SelectFilter::make('delivery name')
                ->relationship('order_delivery' , 'name'),

                Tables\Filters\SelectFilter::make('address name')
                ->relationship('order_address' , 'name'),
                
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
