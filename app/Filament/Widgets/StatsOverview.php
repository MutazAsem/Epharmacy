<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{

    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        return [
            //
            Stat::make('New Orders', Order::query()->where('status', 'New')->count()),
            Stat::make('Processing Orders', Order::query()->where('status', 'Processing')->count()),
            Stat::make('Shipped Orders', Order::query()->where('status', 'Shipped')->count()),
            Stat::make('Total Customers', User::role('panel_user')->count())
                ->description('Increase in Customers')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([9, 6, 10, 4, 8, 6, 4, 10]),
            Stat::make('Total Products', Product::count())
                ->description('Increase in Products')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([9, 6, 10, 4, 8, 6, 4, 10]),

            Stat::make('Total Orders', Order::all()->count())
                ->description('Increase in Orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([9, 6, 10, 4, 8, 6, 4, 10]),
        ];
    }
}
