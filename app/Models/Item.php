<?php

namespace App\Models;

use App\Enums\Status;
use App\Enums\SystemUser;
use App\Helpers\RichContent;
use App\Models\Traits\ItemRelations;
use App\Models\Traits\Publishable;
use App\Models\Traits\Sluggable;
use Carbon\Carbon;
use Filament\Forms\Components\RichEditor\Models\Concerns\InteractsWithRichContent;
use Filament\Forms\Components\RichEditor\Models\Contracts\HasRichContent;
use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use NumberFormatter;
use Relaticle\Comments\Concerns\HasComments;
use Relaticle\Comments\Contracts\Commentable;

/**
 * An Item of Apparel.
 *
 * @property string $slug The URL slug of an item.
 * @property string $english_name The English Title of an Item.
 * @property string|null $foreign_name The 'Japanese Title' of an Item.
 * @property int|null $year The year an Item was released.
 * @property string|null $product_number An Item's product number.
 * @property Status $status The status of an item (stored internally as an int).
 * @property string $price The price of this item, in a given currency.
 * @property float $price_formatted The price of this item, formatted to the rules of the given currency (e.g. /100 for gbp/usd)
 * @property string $currency The currency of this item, as an ISO code.
 * @property array|string[] $images The images attached to this item, as a flexible collection.
 * @property Collection $metadata Metadata attached to this item.
 * @property string|null $duplicate_url URL to the item this one is a duplicate of, if applicable.
 * @property string $user_id The ID of the {@link \App\Models\User user} who submitted this Item.
 * @property string $brand_id The ID of this Item's {@link \App\Models\Brand brand}.
 * @property string $submitter_id The ID of this Item's {@link \App\Models\User submitter}.
 * @property string $publisher_id The ID of this Item's {@link \App\Models\User publisher}.
 * @property Carbon $published_at The date this item was published.
 */
#[Guarded('status', 'slug', 'created_at', 'updated_at', 'published_at')]
#[Visible(
    'english_name', 'foreign_name', 'product_number',
    'currency', 'price', 'price_details', 'year',
    'notes', 'internal_notes',
    'image', 'images',
    'attributes', 'brand', 'categories', 'tags', 'colors', 'features',
    'submitter', 'publisher',
    'created_at', 'updated_at', 'published_at',
    'edit_url', 'slug', 'url',
)]
#[Appends('price_details', 'url', 'edit_url', 'duplicate_url')]
class Item extends Model implements Commentable, HasRichContent
{
    use HasComments {
        comments as private commentRelation;
    }
    use InteractsWithRichContent;
    use ItemRelations, Publishable, Sluggable;

    /**
     * A list of supported currencies.
     *
     * @var array<string, string>
     */
    public const array CURRENCIES = [
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
    public const array FULLY_LOAD = [
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
    public const array PARTIAL_LOAD = [
        'submitter',
        'brand',
        'categories',
        'tags',
    ];

    /**
     * Eager loads.
     *
     * @var array
     */
    protected $with = self::PARTIAL_LOAD;

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
        'metadata' => AsCollection::class,
    ];

    /**
     * Get the formatted price for this item.
     */
    public function getFullPrice(): string
    {
        if (in_array($this->currency, ['jpy', 'krw', 'cny'])) {
            return (string) round($this->price ?? 0);
        }

        return (string) round($this->price ?? 0, 2);
    }

    public function priceFormatted(): AttributeCast
    {
        return AttributeCast::get(function () {
            $price = $this->getFullPrice();

            $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

            if ($this->currency === null) {
                return null;
            }

            return $formatter->formatCurrency($price, $this->currency);
        });
    }

    public function priceDetails(): AttributeCast
    {
        return AttributeCast::get(fn () => [
            'currency' => $this->currency,
            'price' => (int) $this->price,
            'local_price' => $this->getFullPrice(),
            'formatted' => $this->price_formatted,
        ]);
    }

    public function wishlist(): int
    {
        return cache()
            ->tags(['wishlist'])
            ->rememberForever($this->getKey(), fn () => $this->stargazers()->count());
    }

    public function closet(): int
    {
        return cache()
            ->tags(['closet'])
            ->rememberForever($this->getKey(), fn () => $this->owners()->count());
    }

    public function anonymize(bool $force = false): bool
    {
        // guard against running this with a user present
        if ($this->submitter && ! $force) {
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

    protected function duplicateUrl(): AttributeCast
    {
        return AttributeCast::get(function () {
            if (! $this->duplicate()) {
                return null;
            }

            if (is_null($item = Item::find($this->metadata->get('duplicate_item_id')))) {
                return null;
            }

            return $item->url;
        });
    }

    protected function setUpRichContent(): void
    {
        $this->registerRichContent('internal_notes')
            ->mentions(RichContent::mentions());
    }

    public function comments(): MorphMany
    {
        /** @phpstan-ignore-next-line */
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->commentRelation()->withTrashed();
    }
}
