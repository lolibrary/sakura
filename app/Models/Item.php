<?php

namespace App\Models;

use App\Enums\Status;
use App\Enums\SystemUser;
use App\Models\Traits\ItemRelations;
use App\Models\Traits\Publishable;
use App\Models\Traits\Sluggable;
use Illuminate\Support\Facades\Log;
use NumberFormatter;

/**
 * An Item of Apparel.
 *
 * @property string $slug            The URL slug of an item.
 * @property string $english_name    The English Title of an Item.
 * @property string|null $foreign_name    The 'Japanese Title' of an Item.
 * @property int|null $year            The year an Item was released.
 * @property string|null $product_number  An Item's product number.
 * @property Status $status The status of an item (stored internally as an int).
 * @property string $price           The price of this item, in a given currency.
 * @property float $price_formatted The price of this item, formatted to the rules of the given currency (e.g. /100 for gbp/usd)
 * @property string $currency        The currency of this item, as an ISO code.
 * @property array|string[] $images          The images attached to this item, as a flexible collection.
 * @property array $metadata Metadata attached to this item.
 *
 * @property string $user_id  The ID of the {@link \App\Models\User user} who submitted this Item.
 * @property string $brand_id The ID of this Item's {@link \App\Models\Brand brand}.
 * @property string $submitter_id The ID of this Item's {@link \App\Models\User submitter}.
 * @property string $publisher_id The ID of this Item's {@link \App\Models\User publisher}.
 *
 * @property \Carbon\Carbon $published_at The date this item was published.
 */
class Item extends Model
{
    use ItemRelations, Publishable, Sluggable;

    /**
     * A list of supported currencies.
     *
     * @var int
     */
    public const CURRENCIES = [
        'jpy' => 'Japanese Yen (¥)',
        'cny' => 'Chinese Yuan (RMB/¥)',
        'hkd' => 'Hong Kong Dollar (HK$)',
        'krw' => 'South Korean Won (₩)',
        'eur' => 'Euro (€)',
        'usd' => 'US Dollars ($)',
        'gbp' => 'Pound Sterling (£)',
        'cad' => 'Canadian Dollar (CA$)',
        'aud' => 'Australian Dollar (AU$)',
        'mxn' => 'Mexican Pesos ($)',
        'chf' => 'Swiss Francs (CHF)',
        'rub' => 'Russian Rubles (₽)',
        'brl' => 'Brazilian Real (R$)',
        'vnd' => 'Vietnamese đồng (₫)',
        'nzd' => 'New Zealand Dollar ($)',
        'nok' => 'Norwegian Krone (kr)',
        'sek' => 'Swedish Krona (kr)',
        'dkk' => 'Danish Krone (kr)',
        'isk' => 'Icelandic Króne (kr)',
        'sgd' => 'Singapore Dollar ($)',
        'inr' => 'Indian Rupees (₹)',
    ];

    public const array RGB_COLORS = [
        'draft' => 'rgb(186,225,255)',
        'published' => 'rgb(186,255,201)',
        'pending' => 'rgb(255,223,186)',
        'changes requested' => 'rgb(255,179,186)',
        'unknown' => 'rgb(207, 207, 196)',
    ];

    /**
     * A shortcut for fully eager loading an item.
     *
     * Use: `Item::with(Item::FULLY_LOAD)`
     */
    public const FULLY_LOAD = [
        'tags',
        'colors',
        'features',
        'categories',
        'brand',
        'submitter',
        'attributes',
        'publisher',
    ];

    /**
     * The attributes required to show a listing of items.
     *
     * Use: `Item::with(Item::PARTIAL_LOAD)`
     */
    public const PARTIAL_LOAD = [
        'submitter',
        'brand',
        'categories',
        'tags',
    ];

    /**
     * Non-fillable attributes.
     *
     * @var array
     */
    protected $guarded = [
        'status',
        'slug',
        'created_at',
        'updated_at',
        'published_at',
    ];

    /**
     * Eager loads.
     *
     * @var array
     */
    protected $with = self::PARTIAL_LOAD;

    /**
     * Attributes to append.
     *
     * @var array
     */
    protected $appends = ['price_details', 'url', 'edit_url'];

    /**
     * Visible attributes.
     *
     * @var array
     */
    protected $visible = [
        'edit_url',
        'slug',
        'url',
        'english_name',
        'foreign_name',
        'notes',
        'internal_notes',
        'price_details',
        'price',
        'currency',
        'year',
        'product_number',
        'image',
        'images',

        'tags',
        'colors',
        'features',
        'categories',
        'brand',
        'submitter',
        'attributes',
        'publisher',

        'created_at',
        'updated_at',
        'published_at',
    ];

    /**
     * An array of column cast values.
     *
     * @var array
     */
    public $casts = [
        'images' => 'array',
        'additional_images' => 'json',
        'published_at' => 'datetime',
        'price' => 'integer',
        'status' => Status::class,
    ];

    /**
     * Get the formatted price for this item.
     *
     * @return string
     */
    public function getFullPrice()
    {
        if (in_array($this->currency, ['jpy', 'krw', 'cny'])) {
            return (string)round($this->price ?? 0);
        }

        return (string)round($this->price ?? 0, 2);
    }

    /**
     * Get formatted price for an item.
     *
     * @return string
     */
    public function getPriceFormattedAttribute(): string
    {
        $price = $this->getFullPrice();

        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

        if ($price === null) {
            return "";
        }

        return $formatter->formatCurrency($price, $this->currency);
    }

    /**
     * Get a list of pricing details.
     *
     * @return array
     */
    public function getPriceDetailsAttribute()
    {
        return [
            'currency' => $this->currency,
            'price' => (int)$this->price,
            'local_price' => $this->getFullPrice(),
            'formatted' => $this->price_formatted,
        ];
    }

    public function wishlist()
    {
        $wishlist = cache()->tags(['wishlist'])->get($this->getKey());
        if (!$wishlist) {
            $wishlist = $this->stargazers()->count();
            cache()->tags(['wishlist'])->forever($this->getKey(), $wishlist);
        }
        return $wishlist;
    }

    public function closet()
    {
        $closet = cache()->tags(['closet'])->get($this->getKey());
        if (!$closet) {
            $closet = $this->owners()->count();
            cache()->tags(['closet'])->forever($this->getKey(), $closet);
        }
        return $closet;
    }

    public function getCacheKey(): string
    {
        return "items.backup.{$this->getKey()}";
    }

    public function anonymize(bool $force = false): bool
    {
        // guard against running this with a user present
        if ($this->submitter && !$force) {
            Log::alert('tried to anonymize an item with a valid submitter', [
                'item_id' => $this->id,
                'user_id' => $this->user_id,
                'submitter' => $this->submitter->username,
                'slug' => $this->slug,
            ]);

            return false;
        }

        if (is_null($user = User::system(SystemUser::Anonymous))) {
            Log::alert('anonymous system user not set, please run app:system anonymous');
            return false;
        }

        $this->user_id = $user->id;

        return $this->save();
    }
}
