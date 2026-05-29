<?php

namespace App\Filament\Resources\Brands;

use App\Filament\Resources\Brands\Pages\ManageBrands;
use App\Filament\Resources\TranslatableLookupResource;
use App\Models\Brand;
use BackedEnum;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;

class BrandResource extends TranslatableLookupResource
{
    protected static ?string $model = Brand::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Brands';

    protected static string $slugRegex = '/[a-z0-9][a-z0-9\-]{1,100}/u';

    protected static int $slugMaxLength = 100;

    protected static bool $nameIsRequired = true;

    protected static function getBeforeSlugComponents(): array
    {
        return [
            Placeholder::make('current_image')
                ->label('Current Image')
                ->content(function (?Brand $record): string | HtmlString {
                    if (! $record?->image) {
                        return 'No image uploaded.';
                    }

                    $url = e(cdn_link($record->image));

                    return new HtmlString("<a href=\"{$url}\" target=\"_blank\" rel=\"noopener\"><img src=\"{$url}\" alt=\"Brand image\" style=\"max-height: 8rem; border-radius: 0.5rem;\"></a>");
                }),
        ];
    }

    protected static function getAfterSlugComponents(): array
    {
        return [
            TextInput::make('short_name')
                ->required()
                ->maxLength(50)
                ->regex('/[a-z0-9][a-z0-9\-]{1,50}/u')
                ->unique(
                    table: app(static::getModel())->getTable(),
                    column: 'short_name',
                    ignoreRecord: true,
                ),
            TextInput::make('image')
                ->label('Image Path')
                ->maxLength(255)
                ->helperText('Temporary bridge until direct image uploads are rebuilt in Filament.'),
        ];
    }

    protected static function getLeadingTableColumns(): array
    {
        return [
            ImageColumn::make('image_preview')
                ->label('Image')
                ->circular()
                ->state(fn (Brand $record): ?string => $record->image ? cdn_link($record->image) : null),
        ];
    }

    protected static function getTrailingTableColumns(): array
    {
        return [
            TextColumn::make('short_name')
                ->searchable()
                ->toggleable(),
            ...parent::getTrailingTableColumns(),
            TextColumn::make('image')
                ->label('Image Path')
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageBrands::route('/'),
        ];
    }
}
