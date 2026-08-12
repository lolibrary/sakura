<?php

namespace App\Models\Traits;

use App\Enums\Level;
use App\Models\User;

/**
 * User Access Levels for {@see \App\Models\User}.
 *
 * @property bool $banned
 * @property int $level
 */
trait AccessLevels
{
    /**
     * Return the user's permission level.
     */
    public function accessLevel(): int
    {
        if ($this->banned) {
            return Level::Banned->value;
        }

        return $this->level->value;
    }

    /**
     * Check if a user is an immutable system user.
     *
     * Used for preventing access to user edits.
     */
    public function immutable(): bool
    {
        return $this->accessLevel() >= Level::System->value;
    }

    /**
     * Check if a user is a developer.
     *
     * Used for guarding sensitive functions,
     *   e.g. debug info and feature flags.
     *
     * Used for the 'Site Settings' feature flags menu.
     */
    public function developer(): bool
    {
        return $this->accessLevel() >= Level::Developer->value;
    }

    /**
     * Check if a user is a moderator (above admin).
     *
     * Can promote users to senior and manage everyone.
     */
    public function admin(): bool
    {
        return $this->accessLevel() >= Level::Developer->value;
    }

    /**
     * Check if a user is an admin (senior lolibrarian).
     *
     * Full control over the entire submission/entry process.
     */
    public function senior(): bool
    {
        return $this->accessLevel() >= Level::Senior->value;
    }

    /**
     * A level above regular lolibrarian with increased permissions, for trusted contributors.
     *
     * Has the ability to manage tags/features/colors/attributes, but not brands or users.
     */
    public function trusted(): bool
    {
        return $this->accessLevel() >= Level::Trusted->value;
    }

    /**
     * Check if a user is able to process the moderation queue.
     *
     * Lolibrarians can also suggest edits to Items
     *
     * @return bool
     */
    public function lolibrarian(): bool
    {
        return $this->accessLevel() >= Level::Lolibrarian->value;
    }

    /**
     * Check if a user is able to perform basic functions.
     *
     * @return bool
     */
    public function junior(): bool
    {
        return $this->accessLevel() >= Level::Junior->value;
    }

    /**
     * Mostly redundant check that a user can access the site while logged in.
     *
     * @return bool
     */
    public function regular(): bool
    {
        return $this->accessLevel() >= Level::Deactivated->value;
    }
}
