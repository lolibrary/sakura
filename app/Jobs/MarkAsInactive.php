<?php

namespace App\Jobs;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class MarkAsInactive
{
    use Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Item $item, public ?User $actor = null)
    {
        // use the default user if we don't have one.
        if ($actor === null) {
            $this->actor = User::where('username', config('app.system.default-user'))->first();
        }
    }

    /**
     * Execute the job.
     */
    public function handle(): bool
    {
        // first up: handle doing the actual task
        if (! $this->item->draft()) {
            // already requested - no need to do it again
            return true;
        }

        return $this->item->markAsInactive();
    }
}
