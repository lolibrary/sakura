<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

final class Gravatar
{
    public const string BaseUrl = 'https://www.gravatar.com/avatar';

    public const string Default = 'mp';

    public const string Rating = 'g';

    public static function encode(?string $email = null): string
    {
        return hash('sha256', mb_strtolower(mb_trim($email)));
    }

    public static function url(string $email, int $size = 100): string
    {
        return sprintf('%s/%s?%s',
            self::BaseUrl,
            self::encode($email),
            Arr::query([
                's' => $size,
                'd' => self::Default,
                'r' => self::Rating,
            ]),
        );
    }

    public static function image(string $email, int $size = 100, array $attributes = []): string
    {
        return sprintf('<img src="%s" %s />', self::url($email, $size), self::attributes($attributes));
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function attributes(array $attributes): string
    {
        $parts = [];

        foreach ($attributes as $part => $content) {
            if (is_array($content)) {
                $content = Arr::join($content, ' ');
            }

            $parts[] = "$part=\"$content\"";
        }

        return Arr::join($parts, ' ');
    }
}
