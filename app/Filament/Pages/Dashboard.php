<?php

namespace App\Filament\Pages;

use Filament\Schemas\Concerns\RestrictsFileUploadsToSchemaComponents;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends \Filament\Pages\Dashboard
{
    use RestrictsFileUploadsToSchemaComponents;

    public function getTitle(): string|Htmlable
    {
        return '';
    }
}
