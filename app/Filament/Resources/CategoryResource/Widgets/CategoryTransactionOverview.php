<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class CategoryTransactionOverview extends BaseWidget
{
    public ?Model $record = null;
    protected function getStats(): array
    {
        return [

            Stat::make('Total Transaction', $this->record->transaction->count()),
            Stat::make('Total Amount', '$'.number_format($this->record->transaction->sum('amount'),2) ),
        ];
    }
    protected function getColumns(): int
    {
        return 2;
    }
}
