<?php

namespace App\Jobs;

use App\Models\Item;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class PublishItem
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
        if ($this->item->published()) {
            // already published - no action needed
            return true;
        }

        if (! $this->item->publish($this->actor)) {
            return false;
        }

        // next up, send a notification:
        Notification::make()
            ->title('Entry published!')
            ->body("Entry {$this->item->english_name} was published to the site.")
            ->icon('heroicon-o-document-text')
            ->iconColor('success')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url($this->item->url, shouldOpenInNewTab: true),
            ])
            ->sendToDatabase($this->actor);

        // if the publisher and the submitter are not the same person, send a
        // message to the submitter letting them know their entry is now live
        if ($this->item->submitter->isNot($this->actor)) {
            // next up, send a notification:
            Notification::make()
                ->title('Your entry was published!')
                ->body("Your submission {$this->item->english_name} was published to the site.")
                ->icon('heroicon-o-document-text')
                ->iconColor('success')
                ->actions([
                    Action::make('view')
                        ->button()
                        ->url($this->item->url, shouldOpenInNewTab: true),
                ])
                ->sendToDatabase($this->item->submitter);
        }

        return true;
    }
}
