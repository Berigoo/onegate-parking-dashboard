<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\AccessLog;

class VehicleCheckIns extends ChartWidget
{
    protected ?string $heading = 'Vehicle Check Ins';

    protected function getData(): array
    {
        $data = AccessLog::query()
            ->selectRaw('DATE(entered_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Vehicle Check-Ins',
                    'data' => $data->pluck('total'),
                ],
            ],

            'labels' => $data->pluck('date'),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
