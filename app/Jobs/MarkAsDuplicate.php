<?php

namespace App\Jobs;

use App\Models\Item;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MarkAsDuplicate implements ShouldQueue
{
    use Queueable;

    /**
     * @param  Item  $duplicate  The item we want to mark as a duplicate (we're actioning this).
     * @param  Item  $original  The original item to mark against this one.
     */
    public function __construct(public Item $duplicate, public Item $original)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): bool
    {
        // first up: handle doing the actual task
        if ($this->duplicate->duplicate()) {
            // already duplicated - no action needed
            return true;
        }

        // no action taken
        if (! $this->duplicate->markAsDuplicate($this->original)) {
            return false;
        }

        // no notification needed for now.

        return true;
    }
}
