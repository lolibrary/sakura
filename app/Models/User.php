<?php

namespace App\Models;

use App\Enums\Level;
use App\Enums\Status;
use App\Models\Traits\AccessLevels;
use App\Models\Traits\Closet;
use App\Models\Traits\DateHandling;
use App\Models\Traits\HasUuid;
use App\Models\Traits\Wishlist;
use App\Notifications\VerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Contracts\OAuthenticatable;

/**
 * A user of this application.
 *
 * @property string $email          The user's email.
 * @property string $name           The user's name.
 * @property string $username       The user's login username.
 * @property string $remember_token A strong random number that allows the user to use "remember me" sessions.
 *
 * @property Level  $level    The user's level (permissions).
 * @property bool $banned   If the user is banned or not.
 * @property bool $verified Whether or not the user's email has been verified.
 *
 * @property \App\Models\Image $image The user's profile image.
 * @property string $image_id         The user's profile image ID.
 *
 * @property \App\Models\Item[]|\Illuminate\Database\Eloquent\Collection $items    The {@link \App\Item items} this user has submitted.
 * @property \App\Models\Item[]|\Illuminate\Database\Eloquent\Collection $wishlist The {@link \App\Item items} this user has favourited.
 * @property \App\Models\Item[]|\Illuminate\Database\Eloquent\Collection $closet   The {@link \App\Item items} this user owns.
 * @property \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts    The posts this user has created.
 */
class User extends Authenticatable implements MustVerifyEmail, OAuthenticatable, FilamentUser
{
    use Notifiable, HasApiTokens, HasUuid, DateHandling, Wishlist, Closet, AccessLevels;

    /**
     * Whether or not this model has an incrementing timestamp.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * Casts for attributes.
     *
     * @var array
     */
    protected $casts = [
        'banned' => 'boolean',
        'level' => Level::class,
        'email_verified_at' => 'datetime',
    ];

    /**
     * Visible attributes.
     *
     * @var array
     */
    protected $visible = [
        'name',
        'display_name',
        'email',
        'username',
        'profile',
        'created_at',
        'level',
    ];

    protected $appends = [
        'display_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The items a user has submitted.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    /**
     * The items a user has favourited/wishlisted.
     *
     * @param string $order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Item[]
     */
    public function wishlist(string $order = 'added_new')
    {
        return $this->belongsToMany(Item::class, 'wishlist')->withTimestamps()->orderBy(...(sorted($order, 'wishlist')));
    }

    /**
     * The items a user owns.
     *
     * @param string $order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Item[]
     */
    public function closet(string $order = 'added_new')
    {
        return $this->belongsToMany(Item::class, 'closet')->withTimestamps()->orderBy(...(sorted($order, 'closet')));
    }

    /**
     * The posts a user has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\App\Models\Post[]
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get a user's profile.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Scope a query to email address.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeEmail(Builder $query, string $email)
    {
        return $query->where(DB::raw('lower(email)'), mb_strtolower($email));
    }

    /**
     * Send the email verification notification, but queued.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    public function name(): AttributeCast
    {
        return AttributeCast::make(get: fn () => $this->username, set: fn(string $value) => $this->attributes['name'] = $value);
    }

    public function displayName(): AttributeCast
    {
        return AttributeCast::make(
            get: fn () => $this->attributes['name'],
            set: fn (string $value) => $this->attributes['name'] = $value,
        );
    }

    public function publishedItems(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::Published)->count();
    }

    public function changesRequested(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::ChangesRequested)->count();
    }

    public function draftsWaiting(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::Draft)->count();
    }

    public function pendingItems(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::Pending)->count();
    }

    public function verified(): AttributeCast
    {
        return AttributeCast::get(fn() => $this->hasVerifiedEmail());
    }

    /**
     * Set up access to the admin panel for Filament.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->junior() && $this->hasVerifiedEmail();
        }

        return false;
    }
}
