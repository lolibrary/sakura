<?php

namespace App\Nova\Actions;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Notifications\NovaNotification;
use Laravel\Nova\URL;

class PublishItem extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection|\App\Models\Item[]  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->load(Item::FULLY_LOAD);

            if ($model->categories->count() === 0) {
                throw new \RuntimeException("This item doesn't have a category");
            }

            $model->publish(auth()->user());

            if (! auth()->user()->is($model->submitter)) {
                $model->submitter->notify(
                    NovaNotification::make()
                        ->message("Your submission $model->english_name has been approved and is now live!")
                        ->icon('check-circle')
                        ->action('View', URL::remote(route('items.show', $model)))
                        ->openInNewTab()
                );
            }
        }

        return Action::message($models->count().' Item(s) Published');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [];
    }

    /**
     * Check an item is authorized to run.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Item $model
     * @return bool
     */
    public function authorizedToRun(Request $request, $model)
    {
        if ($model->published()) {
            return false;
        }

        return $request->user()->can('publish', $model);
    }
}
