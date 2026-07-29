<?php

namespace App\Filament\Pages;

use BackedEnum, UnitEnum;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\RestrictsFileUploadsToSchemaComponents;
use Filament\Support\Icons\Heroicon;

class SiteSettings extends Page
{
    use RestrictsFileUploadsToSchemaComponents;

    protected string $view = 'filament.pages.site-settings';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog;
    protected static ?int $navigationSort = 8;

    protected static string | UnitEnum | null $navigationGroup = 'Admin';

    protected static bool $shouldRegisterNavigation = false;
}
