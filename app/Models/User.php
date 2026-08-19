<?php

namespace App\Models;

use App\Enums\Level;
use App\Models\Traits\AccessLevels;
use App\Models\Traits\Closet;
use App\Models\Traits\DateHandling;
use App\Models\Traits\FilamentInfo;
use App\Models\Traits\HasStats;
use App\Models\Traits\HasSystemUsers;
use App\Models\Traits\HasUsernames;
use App\Models\Traits\Wishlist;
use App\Notifications\VerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\RouteKey;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Contracts\OAuthenticatable;
use Laravel\Passport\HasApiTokens;
use Relaticle\Comments\Concerns\CanComment;
use Relaticle\Comments\Concerns\HasComments;
use Relaticle\Comments\Contracts\Commentator;

/**
 * A user of this application.
 *
 * @property string $email The user's email.
 * @property string $name The user's name.
 * @property string $username The user's login username.
 * @property string $password The user's password.
 * @property string $remember_token A strong random number that allows the user to use "remember me" sessions.
 * @property Level $level The user's level (permissions).
 * @property bool $banned If the user is banned or not.
 * @property bool $verified Whether or not the user's email has been verified.
 * @property bool $public_closet
 * @property bool $public_wishlist
 * @property Item[]|\Illuminate\Database\Eloquent\Collection $items The {@link Item items} this user has submitted.
 * @property Item[]|\Illuminate\Database\Eloquent\Collection $wishlist The {@link Item items} this user has favourited.
 * @property Item[]|\Illuminate\Database\Eloquent\Collection $closet The {@link Item items} this user owns.
 * @property Username[]|\Illuminate\Database\Eloquent\Collection $usernames The usernames this user has.
 * @property string $id
 * @property Collection $metadata
 */
#[Fillable('name', 'username', 'email', 'password')]
#[Visible('name', 'display_name', 'email', 'username', 'profile', 'created_at', 'level', 'banned')]
#[Appends('display_name')]
#[Hidden('password', 'remember_token')]
#[RouteKey('id')]
class User extends Authenticatable implements Commentator, FilamentUser, HasAvatar, HasName, MustVerifyEmail, OAuthenticatable
{
    use AccessLevels, DateHandling, FilamentInfo, Notifiable, VerifiesEmails;
    use CanComment, HasComments;
    use Closet, Wishlist;
    use HasApiTokens, HasStats, HasSystemUsers, HasUsernames, HasUuids;

    /**
     * Casts for attributes.
     *
     * @var array
     */
    protected $casts = [
        'banned' => 'boolean',
        'level' => Level::class,
        'email_verified_at' => 'datetime',
        'public_closet' => 'boolean',
        'public_wishlist' => 'boolean',
        'metadata' => AsCollection::class,
    ];

    /**
     * The items a user has submitted.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
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
     */
    public function scopeEmail(Builder $query, string $email): Builder
    {
        return $query->where(DB::raw('lower(email)'), mb_strtolower($email));
    }

    /**
     * Send the email verification notification, but queued.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    public function name(): AttributeCast
    {
        return AttributeCast::make(get: fn () => $this->username, set: fn (string $value) => $this->attributes['name'] = $value);
    }

    public function displayName(): AttributeCast
    {
        return AttributeCast::make(
            get: fn () => $this->attributes['name'],
            set: fn (string $value) => $this->attributes['name'] = $value,
        );
    }

    public function verified(): AttributeCast
    {
        return AttributeCast::get(fn () => $this->hasVerifiedEmail());
    }
}
