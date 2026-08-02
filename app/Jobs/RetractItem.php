<?php

namespace App\Jobs;

use App\Models\Item;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class RetractItem
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
        if (! $this->item->published() || $this->item->retracted()) {
            // not published, or already retracted - no action needed
            return true;
        }

        if (! $this->item->retract()) {
            return false;
        }

        // next up, send a notification:
        Notification::make()
            ->title('Entry removed from the site')
            ->body("Entry {$this->item->english_name} was retracted.")
            ->icon('heroicon-o-document-text')
            ->iconColor('warning')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url($this->item->view_url),
            ])
            ->sendToDatabase($this->actor);

        // if the publisher and the submitter are not the same person, send a
        // message to the submitter letting them know their entry is now live
        if ($this->item->submitter->isNot($this->actor)) {
            // next up, send a notification:
            // todo: do we send a notification for this?
            // todo: feature flag / toggle to notify with comments
        }

        return true;
    }
}
