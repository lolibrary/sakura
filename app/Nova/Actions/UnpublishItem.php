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

class UnpublishItem extends Action
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
        $models->each(function (Item $item) {
            $item->load(Item::FULLY_LOAD);

            if ($item->categories->count() === 0) {
                throw new \RuntimeException("This item doesn't have a category");
            }
        });

        return Action::message('Unpublished!');
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
        if ($model->draft()) {
            return false;
        }

        return $request->user()->can('publish', $model);
    }
}
