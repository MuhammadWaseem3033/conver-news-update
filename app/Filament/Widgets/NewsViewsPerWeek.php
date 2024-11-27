<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class NewsViewsPerWeek extends ChartWidget
{
    protected static ?string $heading = 'News Views Per Week';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $monthlyViews = DB::table('news')
            ->selectRaw('DAYOFWEEK(created_at) as day, SUM(views) as total_views')
            ->groupBy('day')
            ->pluck('total_views', 'day')
            ->toArray();

        // Initialize data array with 0 views for all months
        $data = array_fill(1, 7, 0);

        // Populate data array with actual views
        foreach ($monthlyViews as $day => $views) {
            $data[$day] = $views;            
        }

        return [
            'datasets' => [
                [
                    'label' => 'News Views',
                    // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'data' => array_values($data)
                ],
            ],
            'labels' => ['Mon', 'Tues', 'Wed', 'Thus', 'Fri', 'Sat', 'Sun'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
