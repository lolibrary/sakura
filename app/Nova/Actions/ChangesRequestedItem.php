<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Notifications\NovaNotification;
use Laravel\Nova\URL;

class ChangesRequestedItem extends Action
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
            $model->setChangesRequested();

            $model->submitter->notify(
                NovaNotification::make()
                    ->message("Your submission $model->english_name requires some changes in order to be approved. test: ". route('nova.pages.detail', ['items', $model->id]))
                    ->type('warning')
                    ->icon('pencil-square')
                    ->action('Go to submission', URL::remote(route('nova.pages.detail', ['items', $model->id]))),
            );
        }

        return Action::message('Marked as requiring changes!');
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
            return $request->user()->can('publish', $model);
        }

        return $request->user()->can('update', $model);
    }
}
