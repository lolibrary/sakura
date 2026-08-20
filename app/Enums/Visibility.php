<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum Visibility: string implements HasLabel, HasColor, HasIcon
{
    case Private = 'private';
    case Authenticated = 'authenticated';
    case Public = 'public';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Private => Color::Rose,
            self::Authenticated => Color::Gray,
            self::Public => Color::Green,
         };
    }

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Private => 'Private',
            self::Authenticated => 'Require Sign-in',
            self::Public => 'Public',
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Private => Heroicon::OutlinedNoSymbol,
            self::Authenticated => Heroicon::OutlinedShieldCheck,
            self::Public => Heroicon::OutlinedGlobeAlt,
        };
    }

    public static function options(): array
    {
        return [
            self::Private->value => self::Private->getLabel(),
            self::Authenticated->value => self::Authenticated->getLabel(),
            self::Public->value => self::Public->getLabel(),
        ];
    }
}
