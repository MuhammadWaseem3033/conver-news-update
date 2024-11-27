<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class NewsViewsPerDay extends ChartWidget
{
    protected static ?string $heading = 'News Per Day';
    protected static string $color = 'danger';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Fetch views data for the last 7 days grouped by date
        $dailyViews = DB::table('news')
            ->selectRaw('DATE(created_at) as date, SUM(views) as total_views')
            ->where('created_at', '>=', now()->subDays(7)) // Last 7 days
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total_views', 'date')
            ->toArray();
    
        // Initialize data for the last 7 days with 0 views
        $data = [];
        $labels = [];
    
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString(); // Generate date for each of the last 7 days
            $labels[] = $date; // Add to labels
            $data[] = $dailyViews[$date] ?? 0; // Use actual views or 0 if no data for the day
        }
    
        return [
            'datasets' => [
                [
                    'label' => 'News Views',
                    'data' => $data, // Views data for the last 7 days
                ],
            ],
            'labels' => $labels, // Last 7 days as labels
        ];
    }
    


    protected function getType(): string
    {
        return 'line';
    }

    public static function getPriority(): int
    {
        return 2; // Higher priority
    }
}
