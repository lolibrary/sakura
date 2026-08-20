<?php

namespace App\Jobs;

use App\Models\Item;
use App\Models\User;
use DateTimeInterface;
use Filament\Actions\Action;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class ChangeEntrySlug
{
    use Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Item $item, public string $slug, public ?User $actor = null)
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
        if ($this->item->slug === $this->slug) {
            // already published - no action needed
            return true;
        }

        // todo: link if published
        $this->item->metadata->put('previous_slug', $this->item->slug);
        $this->item->metadata->put('slug_changed_at', now()->format(DateTimeInterface::RFC3339));
        $this->item->metadata->put('slug_changed_by', $this->actor?->id);

        $this->item->slug = $this->slug;

        return $this->item->save();
    }
}
