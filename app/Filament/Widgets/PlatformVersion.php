<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class PlatformVersion extends Widget
{
    protected static ?int $sort = 1;

    protected string $view = 'filament.widgets.platform-version';
}
