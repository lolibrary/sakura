<?php

namespace App\Jobs;

use App\Models\Item;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class ReadyForReview
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
    public function handle(): void
    {
        // first up: handle doing the actual task
        if ($this->item->readyForReview()) {
            // already requested - no need to do it again
            return;
        }

        $this->item->markReadyForReview();

        // next up, send a notification:
        Notification::make()
            ->title('You marked an entry ready for review')
            ->body("Entry {$this->item->english_name} updated")
            ->icon(Heroicon::OutlinedCheckCircle)
            ->iconColor('success')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url($this->item->view_url, shouldOpenInNewTab: true),
            ])
            ->sendToDatabase($this->actor);

        if ($this->item->submitter->isNot($this->actor)) {
            Notification::make()
                ->title('Your entry was marked ready for review')
                ->body("Entry {$this->item->english_name} updated")
                ->icon(Heroicon::OutlinedCheckCircle)
                ->iconColor('success')
                ->actions([
                    Action::make('view')
                        ->button()
                        ->url($this->item->view_url, shouldOpenInNewTab: true),
                ])
                ->sendToDatabase($this->item->submitter);
        }
    }
}
