<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum Status: int implements HasColor, HasDescription, HasIcon, HasLabel
{
    case Draft = 0;
    case Published = 1;
    case ReadyForReview = 2;
    case ChangesRequested = 3;
    case MissingImages = 4;
    case Duplicate = 5;
    case Retracted = 6;
    case Inactive = 7;
    case ShoeDraft = 10;

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Draft => 'draft',
            self::Published => 'published',
            self::ReadyForReview => 'ready-for-review',
            self::ChangesRequested => 'changes-requested',
            self::MissingImages => 'missing-images',
            self::ShoeDraft => 'shoe-draft',
            self::Duplicate => 'duplicate',
            self::Inactive => 'inactive',
            self::Retracted => 'retracted',
        };
    }

    public function getName(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Published => 'Published',
            self::ReadyForReview => 'Ready for Review',
            self::ChangesRequested => 'Changes Requested',
            self::MissingImages => 'Missing Images',
            self::ShoeDraft => 'Shoe Draft',
            self::Duplicate => 'Duplicate',
            self::Inactive => 'Inactive',
            self::Retracted => 'Retracted',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Draft => 'info',
            self::Published => 'success',
            self::ReadyForReview => 'warning',
            self::ChangesRequested => 'danger',
            self::Duplicate, self::Inactive => 'gray',
            self::Retracted => 'light',
            default => 'primary',
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Draft => Heroicon::OutlinedDocumentText,
            self::Published => Heroicon::OutlinedCheckCircle,
            self::ReadyForReview => Heroicon::OutlinedQueueList,
            self::ChangesRequested => Heroicon::OutlinedFlag,
            self::MissingImages => Heroicon::OutlinedArchiveBoxXMark,
            self::ShoeDraft => Heroicon::OutlinedArchiveBox,
            self::Duplicate => Heroicon::OutlinedDocumentDuplicate,
            self::Inactive => Heroicon::OutlinedClock,
            self::Retracted => Heroicon::OutlinedExclamationTriangle,
        };
    }

    public function getDescription(): string|Htmlable|null
    {
        return match ($this) {
            self::Draft => 'This is a draft entry that has not been submitted for review yet',
            self::Published => 'This is a published entry, live on the website',
            self::ReadyForReview => 'This entry is ready for review',
            self::ChangesRequested => 'This is an entry that has had changes requested',
            self::MissingImages => 'This entry is missing images (dev label)',
            self::ShoeDraft => 'This entry is a shoe draft from an import (dev label)',
            self::Duplicate => 'This entry is a duplicate of another',
            self::Inactive => 'This draft has not been active for more than a year',
            self::Retracted => 'This entry is no longer published in searches',
        };
    }
}
