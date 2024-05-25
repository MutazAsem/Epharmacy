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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()

                          ->schema([
                            Forms\Components\Select::make('client_id')->required()->options(User::all()->pluck('name','id')->toArray()),
                            Forms\Components\Select::make('address_id')->required()->options(Address::all()->pluck('name','id')->toArray()),
                            Forms\Components\Select::make('delivery_id')->required()->options(User::all()->pluck('name','id')->toArray()),
                            Forms\Components\Textarea::make('note')->columnSpanFull()->required(),
                        ])->columns(2)
                        
                        ]),

                        Forms\Components\Group::make()
                            ->schema([

                        Forms\Components\Section::make()

                            ->schema([
                                Forms\Components\Select::make('status')->required()->options(OrderStatusEnum::class),
                                Forms\Components\Select::make('payment_method')->required()->options(['Paiement when recieving'=>'Paiement when recieving' , 'Payment via wallet'=>'Payment via wallet']),
                                Forms\Components\TextInput::make('total_price')->required()->minValue(0),
                                Forms\Components\DateTimePicker::make('deleted_at'),
                        ])
                        
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('client_id')->searchable()->sortable()->toggleable(),
                Tables\Columns\SelectColumn::make('status')->options(OrderStatusEnum::class)->searchable()->sortable(),
                Tables\Columns\TextColumn::make('payment_method')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('address_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('total_price')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('delivery_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('note')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('deleted_at')->dateTime()->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->searchable()->sortable()->toggleable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('clint name')
                ->relationship('user_order' , 'name'),

                Tables\Filters\SelectFilter::make('delivery name')
                ->relationship('order_delivery' , 'name'),
                
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
