<?php

namespace App\Jobs\Auth;

use App\Enums\Level;
use App\Models\User;
use App\Models\Username;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MergeAccounts implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $old, public User $new)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @throws \Throwable
     */
    public function handle(): void
    {
        DB::transaction(function () {
            // combine relations
            $this->combineClosets();
            $this->combineWishlists();
            $this->moveAuthors();

            // merge old's attributes into new in order
            $this->mergeNewUser();

            // save the old account as deactivated
            $this->deactivateOldUser();

            // assign the old usernames to this user
            $this->old->usernames()->each(fn(Username $username) => $username->user()->associate($this->new)->save());

            // save everything for now
            $this->old->save();
            $this->new->save();

            // refresh this model within this transaction
            $this->new = $this->new->fresh();

            // de-duplicate any usernames that are matching
            $this->deduplicateUsernames();
        });
    }

    protected function mergeNewUser(): void
    {
        if ($this->old->hasVerifiedEmail() && !$this->new->hasVerifiedEmail()) {
            $this->new->email_verified_at = $this->old->email_verified_at;
        }

        // set metadata for this
        $this->new->metadata->put('previous_email', $this->new->email);
        $this->new->metadata->put('merged_id', $this->old->id);
        $this->new->metadata->put('merged_username', $this->old->username);
        $this->new->metadata->put('merged_email', $this->old->email);
        $this->new->metadata->put('can_change_username', true);
        $this->new->email = str($this->new->email)->lower()->toString();
    }

    protected function deactivateOldUser(): void
    {
        $this->old->metadata->put('previous_username', $this->old->username);
        $this->old->metadata->put('previous_email', $this->old->email);
        $this->old->metadata->put('previous_level', $this->old->level);
        $this->old->metadata->put('merged_into_id', $this->new->id);
        $this->old->metadata->put('merged_into_username', $this->new->username);
        $this->old->metadata->put('merged_into_email', $this->new->email);
        $this->old->username = "deactivated.{$this->old->username}";
        $this->old->email = "deactivated+\"{$this->old->email}\"@lolibrary.org";
        $this->old->password = Hash::make(Str::random(32));
        $this->old->level = Level::Deactivated;
    }

    /**
     * In a nutshell, we want to:
     *
     * - check if different case versions of the same username exist
     * - where they do exist, force delete the uppercase version
     * - where both are mixed-case, attempt to save a lowercased name
     * - in any other event log + bail out.
     *
     * @return void
     */
    protected function deduplicateUsernames(): void
    {
        // just to be sure first
        $this->new = $this->new->fresh();

        /** @var Username[]|\Illuminate\Database\Eloquent\Collection<Username> $usernames */
        $usernames = $this->new->usernames()
            ->get()
            ->groupBy(fn(Username $u) => str($u->username)->lower()->toString());


        $usernames->each(function (Collection $collection, string $username) {
            // only take action here if we have two usernames that match
            if ($collection->count() === 2) {
                // take the simple option: delete both, add in the lowercased version
                $collection->each->forceDelete();
                $this->new->usernames()->create(['username' => $username]);
                $this->new->metadata->put('previous_username', $this->new->username);
                $this->new->username = $username;
                $this->new->save();
            }
        });

        $previous = $this->new->username;
        $lowercased = str($this->new->username)->lower()->toString();

        // if, after all of this, username is still not lowercased, try-catch it anyway
        if ($previous !== $lowercased) {
            $this->new->metadata->put('previous_username', $previous);
            $this->new->username = $lowercased;
            $this->new->save();
        }
    }

    protected function moveAuthors(): void
    {
        if ($this->old->items->count() === 0) {
            $this->old->metadata->put('previous_items', []);
            return;
        }

        $items = $this->old->items->pluck(['id', 'slug'])->all();
        $this->old->metadata->put('previous_items', $items);

        Log::info('updating items for merged user', [
            'user' => [
                'id' => $this->new->id,
                'username' => $this->new->username,
            ],
            'old' => [
                'id' => $this->old->id,
                'username' => $this->old->username,
            ],
            'items' => $items,
        ]);

        foreach ($this->old->items as $item) {
            $item->user_id = $this->new->id;
            $item->save();
        }
    }

    protected function combineClosets(): void
    {
        // no need to continue if old has anything in here.
        if ($this->old->closet->count() === 0) {
            $this->old->metadata->put('previous_closet', []);
            return;
        }

        $closet = $this->old->closet->pluck('slug')->all();
        $this->old->metadata->put('previous_closet', $closet);

        Log::info('updating closet for merged user', [
            'user' => [
                'id' => $this->new->id,
                'username' => $this->new->username,
            ],
            'old' => [
                'id' => $this->old->id,
                'username' => $this->old->username,
            ],
            'closet' => [
                'old' => $closet,
                'new' => $this->new->closet->pluck('slug')->all(),
            ],
        ]);

        // merge the two first
        $closet = $this->new->closet->merge($this->old->closet);

        // filter out any duplicates
        $this->new->closet()->sync($closet->unique());
    }

    protected function combineWishlists(): void
    {
        // no need to continue if old has nothing in here.
        if ($this->old->wishlist->count() === 0) {
            $this->old->metadata->put('previous_wishlist', []);
            return;
        }

        $wishlist = $this->old->wishlist->pluck('slug')->all();
        $this->old->metadata->put('previous_wishlist', $wishlist);

        Log::info('updating wishlist for merged user', [
            'user' => [
                'id' => $this->new->id,
                'username' => $this->new->username,
            ],
            'old' => [
                'id' => $this->old->id,
                'username' => $this->old->username,
            ],
            'wishlist' => [
                'old' => $wishlist,
                'new' => $this->new->wishlist->pluck('slug')->all(),
            ],
        ]);

        // merge the two first
        $wishlist = $this->new->wishlist->merge($this->old->wishlist);

        // filter out any duplicates
        $this->new->wishlist()->sync($wishlist->unique());
    }
}
