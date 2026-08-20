<?php

namespace App\Models\Traits;

use App\Models\User;
use App\Models\Username;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

trait HasUsernames
{
    /**
     * @return HasMany<Username, $this>
     */
    public function usernames(): HasMany
    {
        return $this->hasMany(Username::class);
    }

    /**
     * @return BelongsTo<Username, $this>
     */
    public function currentUsername(): BelongsTo
    {
        return $this->belongsTo(Username::class, foreignKey: 'username');
    }

    public function canChangeUsername(): bool
    {
        if ($this->metadata->get('can_change_username')) {
            return true;
        }

        // give you your first username change for free
        if ($this->usernames->count() === 1) {
            return true;
        }

        if ($this->lastChangedUsername() === null) {
            return true;
        }

        return $this->lastChangedUsername()->isBefore(now()->subMonths(3));
    }

    public function lastChangedUsername(): ?Carbon
    {
        return $this->currentUsername->updated_at;
    }

    /**
     * Scope a query to username.
     *
     * @return Builder<User>
     */
    public function scopeUsername(Builder $query, string $username): Builder
    {
        return $query->where('username', $username);
    }
}
