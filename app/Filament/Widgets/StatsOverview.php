<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('All News', News::count())
                ->description('All News Here')
                ->descriptionIcon('heroicon-s-building-office-2', IconPosition::Before)
                ->descriptionColor('success')
                ->chart([News::count(), '2', '5', '8', '1'])
                ->url('')
                ->color('success')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ]),

            Stat::make('All News Categroy', Category::count())
                ->description('All News Category is Here')
                ->descriptionIcon('heroicon-s-presentation-chart-line', IconPosition::Before)
                ->descriptionColor('danger')
                ->chart([Category::count(), '2', '5', '8', '1'])
                ->url('')
                ->color('success'),

            Stat::make('All User', User::count())
                ->description('All Users is Here')
                ->descriptionIcon('heroicon-s-users', IconPosition::Before)
                ->descriptionColor('danger')
                ->chart([User::count(), '2', '5', '8', '1'])
                ->color('success')
                ->url(''),
        ];
    }

    protected function getColumns(): int
    {
        return 3; // Set 3 columns for the widget layout

    }

    public static function getPriority(): int
    {
        return 1; // Higher priority
    }

}
