<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class OrderChart extends ChartWidget
{
    use HasWidgetShield;
    
    protected static ?string $heading = 'Chart';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = Order::select('status', DB::raw('count(*) as  count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        return [
            //
            'datasets' => [
                [
                    'label' => 'Orders Status',
                    'data' => array_values($data)
                ]
            ],
            'labels' => OrderStatusEnum::cases(),
        ];
    }

    // protected function getOptions(): array
    // {
    //     return [
    //         'scales' => [
    //             'y' => [
    //                 'beginAtZero' => true,
    //                 'ticks' => [
    //                     'precision' => 0
    //                 ],
    //             ],
    //         ],
    //     ];
    // }

    protected function getType(): string
    {
        return 'bar';
    }

}
