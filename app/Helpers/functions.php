<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Model;
use App\Models\Tag;
use App\Models\User;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

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
     *
     * @return string
     */
    function uuid(): string
    {
        $node = dechex(random_int(0, 1 << 48) | 0x010000000000);

        return (string) Ramsey\Uuid\Uuid::uuid1($node);
    }
}

if (! function_exists('uuid4')) {
    /**
     * Return a random UUID, version 4.
     *
     * @return string
     */
    function uuid4(): string
    {
        return (string) Ramsey\Uuid\Uuid::uuid4();
    }
}

if (! function_exists('uuid5')) {
    /**
     * Return a sha1-based uuid, version 5.
     *
     * @param string $name
     *
     * @return string
     */
    function uuid5(string $name): string
    {
        return (string) Ramsey\Uuid\Uuid::uuid5(Model::NAMESPACE_UUID, $name);
    }
}

if (! function_exists('userify')) {
    /**
     * Return a username suitable for storage or searching from a display name.
     *
     * @param string $username
     *
     * @return string
     */
    function userify(string $username): string
    {
        $username = mb_strtolower($username);
        $username = preg_replace('/(\s+|[-]+)/u', '', $username);

        return $username;
    }
}

if (! function_exists('user')) {
    /**
     * Get a user by email, slug or uuid.
     *
     * @param string $id
     * @return \App\Models\User|null
     */
    function user($id)
    {
        if (validator(['id' => $id], ['id' => 'required|email'])->passes()) {
            return User::where(DB::raw('lower(email)'), mb_strtolower($id))->first();
        }

        if (Ramsey\Uuid\Uuid::isValid($id)) {
            return User::find($id);
        }

        return User::where('username', $id)->first();
    }
}

if (! function_exists('slack')) {
    /**
     * Send a slack message notification.
     *
     * @param string $type
     * @return \Illuminate\Notifications\AnonymousNotifiable
     */
    function slack(string $type = 'notifications')
    {
        return Notification::route('slack', config("services.slack.$type"));
    }
}

if (! function_exists('add_s3_bucket')) {
    /**
     * Add an S3 bucket to a URL.
     *
     * @param string|null $url
     * @param string|null $bucket
     * @return string|null
     */
    function add_s3_bucket(?string $url, ?string $bucket)
    {
        if ($bucket === null || $url === null) {
            return null;
        }

        $uri = (new Uri($url));

        return (string) $uri->withHost("${bucket}.".$uri->getHost());
    }
}

if (! function_exists('search_route')) {
    /**
     * Get a search route for use with direct-linking.
     *
     * @param array $params
     * @return string
     */
    function search_route(array $params)
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
     *
     * @return string
     */
    function default_asset()
    {
        return Storage::url('assets/default.png');
    }
}

if (! function_exists('brand')) {
    /**
     * Get a brand while in a tinker session by UUID or username.
     *
     * @param string $slug
     * @return \App\Models\Brand
     */
    function brand(string $slug)
    {
        return Brand::where('slug', $slug)->orWhere('short_name', $slug)->first();
    }
}

if (! function_exists('category')) {
    /**
     * Get a category while in a tinker session by UUID or username.
     *
     * @param string $slug
     * @return \App\Models\Category
     */
    function category(string $slug)
    {
        return Category::where('slug', $slug)->first();
    }
}

if (! function_exists('tag')) {
    /**
     * Get a tag while in a tinker session by UUID or username.
     *
     * @param string $slug
     * @return \App\Models\Tag
     */
    function tag(string $slug)
    {
        return Tag::where('slug', $slug)->first();
    }
}

if (! function_exists('feature')) {
    /**
     * Get a feature while in a tinker session by UUID or username.
     *
     * @param string $slug
     * @return \App\Models\Feature
     */
    function feature(string $slug)
    {
        return Feature::where('slug', $slug)->first();
    }
}

if (! function_exists('color')) {
    /**
     * Get a color while in a tinker session by UUID or username.
     *
     * @param string $slug
     * @return \App\Models\Color
     */
    function color(string $slug)
    {
        return Color::where('slug', $slug)->first();
    }
}

if (! function_exists('cdn_path')) {
    /**
     * Get the CDN path to an image.
     *
     * @param string $path
     * @return string
     */
    function cdn_path(string $path)
    {
        return config('cdn.image.url').'/'.config('cdn.image.folder').'/'.$path;
    }
}

if (! function_exists('cdn_link')) {
    /**
     * Gets a CDN path to a specific URL, not just an image.
     *
     * @param string $path
     * @return string
     */
    function cdn_link(string $path)
    {
        return config('cdn.image.url').'/'.$path;
    }
}

if (! function_exists('cdn_thumbnail')) {
    function cdn_thumbnail(string $path, array $options = []) {
        if (is_null($path)) {
            $path = default_asset();
        };
        static $defaults = [
            'width' => '300',
            'height' => '300',
            'fit' => 'bounds',
        ];

        $query = $defaults + $options;

        return cdn_link($path) . '?' . http_build_query($query);
    }
}

if (! function_exists('purify')) {
    /**
     * Return text run through Purify
     *
     * @param string $path
     * @return string
     */
    function purify(string $input)
    {
        return Purify::clean($input);
    }
}

if (! function_exists('sorted')) {
   /**
     * Takes a list of items and returns them sorted in a particular order
     *
     * @param \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Item[] $items
     * @param string $order
     * @param string $relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Item[]
     */
    function sorted($items, $order, $relationship = null)
    {
        switch($order) {
            case ORDER['ADDED_OLDEST']['key']:
                $table = $relationship ? "$relationship.created_at" : 'created_at';
                return $items->orderBy($table, 'asc');
                break;
            case ORDER['ADDED_NEWEST']['key']:
                $table = $relationship ? "$relationship.created_at" : 'created_at';
                return $items->orderBy($table, 'desc');
                break;
            case ORDER['ALPHA']['key']:
                return $items->orderBy('english_name', 'asc');
                break;
            case ORDER['ALPHA_REVERSE']['key']:
                return $items->orderBy('english_name', 'desc');
                break;
            case ORDER['YEAR_OLDEST']['key']:
                return $items->orderBy('year', 'asc');
                break;
            case ORDER['YEAR_NEWEST']['key']:
                return $items->orderBy('year', 'desc');
                break;
            }
    }

}

