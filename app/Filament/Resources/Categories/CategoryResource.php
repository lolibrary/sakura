<?php

namespace App\Filament\Resources\Categories;

use App\Filament\Resources\Categories\Pages\ManageCategories;
use App\Filament\Resources\TranslatableLookupResource;
use App\Models\Category;
use BackedEnum;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;

class CategoryResource extends TranslatableLookupResource
{
    protected static ?string $model = Category::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Categories';

    protected static bool $nameIsRequired = true;

    protected static function getBeforeSlugComponents(): array
    {
        return [
            Placeholder::make('current_image')
                ->label('Current Image')
                ->content(function (?Category $record): string | HtmlString {
                    if (! $record?->image) {
                        return 'No image uploaded.';
                    }

                    $url = e(cdn_link($record->image));

                    return new HtmlString("<a href=\"{$url}\" target=\"_blank\" rel=\"noopener\"><img src=\"{$url}\" alt=\"Category image\" style=\"max-height: 8rem; border-radius: 0.5rem;\"></a>");
                }),
        ];
    }

    protected static function getAfterSlugComponents(): array
    {
        return [
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
                ->state(fn (Category $record): ?string => $record->image ? cdn_link($record->image) : null),
        ];
    }

    protected static function getTrailingTableColumns(): array
    {
        return [
            ...parent::getTrailingTableColumns(),
            TextColumn::make('image')
                ->label('Image Path')
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCategories::route('/'),
        ];
    }
}
