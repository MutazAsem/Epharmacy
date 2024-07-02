<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource;
use App\Models\Order;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    use HasWidgetShield;

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(10)
            ->defaultSort('created_at', 'desc')

            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Order ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_order.name')
                    ->label('Client Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status of order')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (OrderStatusEnum $state): string => match ($state->value) {
                        'New' => 'info',
                        'Processing' => 'warning',
                        'Shipped' => 'warning',
                        'Delivered' => 'success',
                        'Cancelled' => 'danger',
                    })
                    ->icon(fn (OrderStatusEnum $state): string => match ($state->value) {
                        'New' => 'heroicon-o-sparkles',
                        'Processing' => 'heroicon-o-arrow-path',
                        'Shipped' => 'heroicon-o-truck',
                        'Delivered' => 'heroicon-o-check-circle',
                        'Cancelled' => 'heroicon-o-x-circle',
                    }),

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
            ])->actions([
                Tables\Actions\EditAction::make()
                    ->url(fn (Order $record): string => OrderResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
