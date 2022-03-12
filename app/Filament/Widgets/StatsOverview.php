<?php

namespace App\Filament\Widgets;

use App\Models\Cardio;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    public $totalDistance;
    public $distanceChart;

    public function mount()
    {
        $this->totalDistance = Cardio::pluck('distance')->sum();
        $this->distanceChart = Cardio::pluck('distance')->take(30)->toArray();
    }

    protected function getCards(): array
    {
        return [
            Card::make('Total Distance', $this->totalDistance . 'm')
                ->chart($this->distanceChart)
                ->color('success'),
            Card::make('Total Distance', ''),
            Card::make('Total Distance', ''),
        ];
    }
}
