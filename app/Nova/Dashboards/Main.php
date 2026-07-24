<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\ItemsPublished;
use App\Nova\Metrics\YourSubmissions;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            ItemsPublished::make()
                ->width('1/4')
                ->help('Items published on Lolibrary to date.'),
            YourSubmissions::make()
                ->width('1/4')
                ->help('All items you have created which are in the "draft", "pending" or "changes requested" states.'),
        ];
    }
}
