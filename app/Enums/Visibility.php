<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Visibility: string implements HasLabel, HasColor
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
}
