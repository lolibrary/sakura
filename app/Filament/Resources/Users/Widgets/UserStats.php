<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;

class UserStats extends StatsOverviewWidget
{
    public ?User $record = null;

    protected function getStats(): array
    {
        return [
            //
        ];
    }
}
