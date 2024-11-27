<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class NewsViews extends ChartWidget
{
    protected static ?string $heading = 'News Views';
    protected static string $color = 'success';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $monthlyViews = DB::table('news')
            ->selectRaw('MONTH(created_at) as month, SUM(views) as total_views')
            ->groupBy('month')
            ->pluck('total_views', 'month')
            ->toArray();

        // Initialize data array with 0 views for all months
        $data = array_fill(1, 12, 0);

        // Populate data array with actual views
        foreach ($monthlyViews as $month => $views) {
            $data[$month] = $views;            
        }

        return [
            'datasets' => [
                [
                    'label' => 'News Views',
                    // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'data' => array_values($data)
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public static function getPriority(): int
    {
        return 3; // Higher priority
    }
}
