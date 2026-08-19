<?php

namespace App\Jobs;

use App\Models\Item;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class RequestChanges
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
        if ($this->item->changesRequested()) {
            // already requested - no need to do it again
            return true;
        }

        if (! $this->item->requestChanges()) {
            return false;
        }

        // next up, send a notification:
        Notification::make()
            ->title('You requested changes on an entry')
            ->body("Entry {$this->item->english_name} updated")
            ->icon(Heroicon::OutlinedChatBubbleLeftEllipsis)
            ->iconColor('warning')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url($this->item->view_url, shouldOpenInNewTab: true),
            ])
            ->sendToDatabase($this->actor);

        // if the publisher and the submitter are not the same person, send a
        // message to the submitter letting them know their entry is now live
        if ($this->item->submitter->isNot($this->actor)) {
            // next up, send a notification:
            Notification::make()
                ->title('Your entry needs some changes')
                ->body("Your entry {$this->item->english_name} has been reviewed")
                ->icon(Heroicon::OutlinedChatBubbleLeftEllipsis)
                ->iconColor('warning')
                ->actions([
                    Action::make('view')
                        ->button()
                        ->url($this->item->view_url, shouldOpenInNewTab: true),
                    Action::make('edit')
                        ->button()
                        ->url($this->item->edit_url, shouldOpenInNewTab: true),
                ])
                ->sendToDatabase($this->item->submitter);
        }

        return true;
    }
}
