<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ChangesRequestedItem extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $models->each->setChangesRequested();

        return Action::message('Marked as requiring changes!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
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
