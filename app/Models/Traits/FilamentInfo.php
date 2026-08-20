<?php

namespace App\Models\Traits;

use App\Helpers\Gravatar;
use Filament\Panel;

trait FilamentInfo
{
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

    public function getFilamentAvatarUrl(): ?string
    {
        return Gravatar::url($this->email);
    }

    public function getFilamentName(): string
    {
        return $this->username;
    }
}
