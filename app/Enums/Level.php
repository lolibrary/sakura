<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasDescription;
use Illuminate\Contracts\Support\Htmlable;

enum Level: int implements HasLabel, HasColor, HasIcon, HasDescription
{
    case Amy = 3000;
    case System = 2000;
    case Developer = 1000;
    case Admin = 500;
    case Trusted = 200;
    case Senior = 100;
    case Lolibrarian = 50;
    case Junior = 10;
    case Regular = 0;
    case Banned = -1;


    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Amy => 'Creator',
            self::System => 'System',
            self::Developer => 'Developer',
            self::Admin => 'Admin',
            self::Senior => 'Senior Lolibrarian',
            self::Trusted => 'Lolibrarian (Trusted)',
            self::Lolibrarian => 'Lolibrarian',
            self::Junior => 'Junior Lolibrarian',
            self::Regular => 'Regular',
            self::Banned => 'Unknown',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::System, self::Developer, self::Admin => 'gray',
            self::Trusted => 'success',
            self::Senior,  => 'warning',
            self::Junior, self::Lolibrarian => 'info',
            self::Amy, self::Regular => 'primary',
            self::Banned => 'danger',
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Amy => Heroicon::OutlinedSparkles,
            self::System => Heroicon::OutlinedCommandLine,
            self::Developer => Heroicon::OutlinedCodeBracketSquare,
            self::Admin => Heroicon::OutlinedShieldCheck,
            self::Trusted => Heroicon::OutlinedShieldExclamation,
            self::Senior => Heroicon::OutlinedUserPlus,
            self::Lolibrarian => Heroicon::OutlinedDocumentCheck,
            self::Junior => Heroicon::OutlinedPencilSquare,
            self::Regular => Heroicon::OutlinedUser,
            self::Banned => Heroicon::OutlinedXCircle,
        };
    }

    public function getDescription(): string|Htmlable|null
    {
        return match ($this) {
            self::Amy => 'amethystcitrine, the original creator of Lolibrary',
            self::System => 'System User',
            self::Developer => 'Developer for Lolibrary',
            self::Admin => 'Administrator',
            self::Trusted => 'Trusted Senior Lolibrarian, with edit permissions for relations',
            self::Senior => 'Senior Lolibrarian, in charge of data accuracy',
            self::Lolibrarian => 'Lolibrarian, a trusted contributor to the site',
            self::Junior => 'Junior Lolibrarian, a regular contributor',
            self::Regular => 'Regular user of the site without contribution access',
            self::Banned => 'This user has been banned from contributing',
        };
    }

    public static function options(): array
    {
        return [
            self::System->value => 'System User',
            self::Developer->value => 'Developer',
            self::Admin->value => 'Administrator',
            self::Trusted->value => 'Trusted Senior',
            self::Senior->value => 'Senior Lolibrarian',
            self::Lolibrarian->value => 'Lolibrarian',
            self::Junior->value => 'Junior Lolibrarian',
            self::Regular->value => 'Regular',
        ];
    }
}
