<?php

use App\Models\Informational;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

const ORDER = [
    'YEAR_NEWEST' => ['name' => 'Year (newest first)', 'key' => 'year_new'],
    'YEAR_OLDEST' => ['name' => 'Year (oldest first)', 'key' => 'year_old'],
    'ADDED_NEWEST' => ['name' => 'Added (newest first)', 'key' => 'added_new'],
    'ADDED_OLDEST' => ['name' => 'Added (oldest first)', 'key' => 'added_old'],
    'ALPHA' => ['name' => 'English Name (A to Z)', 'key' => 'alpha'],
    'ALPHA_REVERSE' => ['name' => 'English Name (Z to A)', 'key' => 'alpha_reverse'],
];

if (! function_exists('uuid')) {
    /**
     * Return a UUID without giving away our mac address.
     * Completely resistant to collisions.
     */
    function uuid(): string
    {
        $node = dechex(random_int(0, 1 << 48) | 0x010000000000);

        return (string) Uuid::uuid1($node);
    }
}

if (! function_exists('uuid4')) {
    /**
     * Return a random UUID, version 4.
     */
    function uuid4(): string
    {
        return (string) Uuid::uuid4();
    }
}

if (! function_exists('slack')) {
    /**
     * Send a slack message notification.
     *
     * @return AnonymousNotifiable
     */
    function slack(string $type = 'notifications')
    {
        return Notification::route('slack', config("services.slack.$type"));
    }
}

if (! function_exists('search_route')) {
    /**
     * Get a search route for use with direct-linking.
     */
    function search_route(array $params): string
    {
        $results = [];

        foreach ($params as $key => $values) {
            $values = (array) $values;

            foreach ($values as $value) {
                $results[] = rawurlencode($key).'[]='.rawurlencode($value);
            }
        }

        return route('search').'?'.implode('&', $results);
    }
}

if (! function_exists('default_asset')) {
    /**
     * Get the default asset, preferrably from the CDN.
     */
    function default_asset(): string
    {
        return Storage::url('assets/default.png');
    }
}

if (! function_exists('cdn_path')) {
    /**
     * Get the CDN path to an image.
     */
    function cdn_path(string $path): string
    {
        return config('cdn.image.url').'/'.config('cdn.image.folder').'/'.$path;
    }
}

if (! function_exists('cdn_link')) {
    /**
     * Gets a CDN path to a specific URL, not just an image.
     */
    function cdn_link(?string $path): string
    {
        if ($path === null) {
            $path = 'assets/default.png';
        }

        if (Str::startsWith($path, 'https://')) {
            return $path;
        }

        return config('cdn.image.url').'/'.$path;
    }
}

if (! function_exists('cdn_thumbnail')) {
    function cdn_thumbnail(?string $path, array $options = []): string
    {
        static $defaults = [
            'width' => '300',
            'height' => '300',
            'fit' => 'bounds',
        ];

        $query = $defaults + $options;

        return cdn_link($path).'?'.http_build_query($query);
    }
}

if (! function_exists('sorted')) {
    /**
     * Takes a list of items and returns them sorted in a particular order
     *
     * @return list<string>
     */
    function sorted(string $order, ?string $relationship = null): array
    {
        switch ($order) {
            case ORDER['ADDED_OLDEST']['key']:
                $table = $relationship ? "$relationship.created_at" : 'created_at';

                return [$table, 'asc'];
            case ORDER['ALPHA']['key']:
                return ['english_name', 'asc'];
            case ORDER['ALPHA_REVERSE']['key']:
                return ['english_name', 'desc'];
            case ORDER['YEAR_OLDEST']['key']:
                return ['year', 'asc'];
            case ORDER['YEAR_NEWEST']['key']:
                return ['year', 'desc'];
            default:
                $table = $relationship ? "$relationship.created_at" : 'created_at';

                return [$table, 'desc'];
        }
    }

}

if (! function_exists('valid_sort')) {
    /**
     * Checks if a key is a valid sort column.
     */
    function valid_sort(string $order): bool
    {
        $order_opts = array_map(function ($a) {
            return $a['key'];
        }, ORDER);

        return in_array($order, $order_opts);
    }

}

if (! function_exists('translated')) {
    function translated(Informational $model, ?string $locale = null, ?string $name = null): ?string
    {
        return app('translations.helper')->get($model, $locale, $name);
    }
}
