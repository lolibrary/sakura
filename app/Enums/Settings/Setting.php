<?php

namespace App\Enums\Settings;

enum Setting: string
{
    case TooltipEnglishName = 'tooltip.english_name';
    case TooltipOriginalName = 'tooltip.original_name';
    case TooltipBrand = 'tooltip.brand';
    case TooltipSlug = 'tooltip.slug';
    case TooltipMetadata = 'tooltip.metadata';
    case TooltipProductNumber = 'tooltip.product_number';
    case TooltipYear = 'tooltip.year';
    case TooltipCurrency = 'tooltip.currency';
    case TooltipPrice = 'tooltip.price';
    case TooltipCategories = 'tooltip.categories';
    case TooltipFeatures = 'tooltip.features';
    case TooltipTags = 'tooltip.tags';
    case TooltipColors = 'tooltip.colors';
    case TooltipAttributes = 'tooltip.attributes';
    case TooltipMainImage = 'tooltip.image';
    case TooltipImages = 'tooltip.images';
    case TooltipNotes = 'tooltip.notes';
    case TooltipInternalNotes = 'tooltip.internal_notes';

    case HelptextEnglishName = 'helptext.english_name';
    case HelptextOriginalName = 'helptext.original_name';
    case HelptextBrand = 'helptext.brand';
    case HelptextSlug = 'helptext.slug';
    case HelptextMetadata = 'helptext.metadata';
    case HelptextProductNumber = 'helptext.product_number';
    case HelptextYear = 'helptext.year';
    case HelptextCurrency = 'helptext.currency';
    case HelptextPrice = 'helptext.price';
    case HelptextCategories = 'helptext.categories';
    case HelptextFeatures = 'helptext.features';
    case HelptextTags = 'helptext.tags';
    case HelptextColors = 'helptext.colors';
    case HelptextAttributes = 'helptext.attributes';
    case HelptextMainImage = 'helptext.image';
    case HelptextImages = 'helptext.images';
    case HelptextNotes = 'helptext.notes';
    case HelptextInternalNotes = 'helptext.internal_notes';

    case Maintenance = 'maintenance';

    public function type(): Type
    {
        return match ($this) {
            self::Maintenance => Type::Toggle,
            default => Type::Text,
        };
    }

    public function section(): Section
    {
        $prefix = str($this->value)->split('.')->first();

        return match ($prefix) {
            'tooltip' => Section::Tooltip,
            'helptext' => Section::HelpText,
            default => Section::General,
        };
    }
}
