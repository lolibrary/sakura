<?php

namespace App\Helpers;

use App\Models\User;
use Filament\Forms\Components\RichEditor\MentionProvider;
use Filament\Forms\Components\RichEditor\ToolbarButtonGroup;
use Filament\Support\Icons\Heroicon;

class RichContent
{
    public static function toolbar(): array
    {
        return [
            ['bold', 'italic', 'underline', 'strike', 'link'],
            [ToolbarButtonGroup::make('Alignment', ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'])],
            ['blockquote', 'bulletList', 'orderedList'],
            ['undo', 'redo'],
            [ToolbarButtonGroup::make('Extras', ['lead', 'small', 'horizontalRule', 'clearFormatting'])->icon(Heroicon::EllipsisHorizontal)],
        ];
    }

    public static function mentions(): array
    {
        return [
            MentionProvider::make('@')
                ->getSearchResultsUsing(fn (string $search): array => User::query()
                    ->where('username', 'like', "$search%")
                    ->orderBy('username')
                    ->limit(10)
                    ->pluck('username', 'id')
                    ->all())
                ->getLabelsUsing(fn (array $ids): array => User::query()
                    ->whereIn('id', $ids)
                    ->pluck('username', 'id')
                    ->all()),
        ];
    }

    public static function format(): \Closure
    {
        return fn (string $state): string => self::replaceTags($state);
    }

    protected static function replaceTags(string $html): string
    {
        return str($html)->replace(['<div>', '</div>'], ['<p>', '</p>'])->toString();
    }
}
