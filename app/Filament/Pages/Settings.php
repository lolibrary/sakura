<?php

namespace App\Filament\Pages;

use BackedEnum, UnitEnum;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\RestrictsFileUploadsToSchemaComponents;
use Filament\Support\Icons\Heroicon;

class Settings extends Page
{
    use RestrictsFileUploadsToSchemaComponents;

    protected string $view = 'filament.pages.manage-settings';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static ?int $navigationSort = PHP_INT_MAX;

    protected static string | UnitEnum | null $navigationGroup = 'Profile';

    protected static bool $shouldRegisterNavigation = false;
}
