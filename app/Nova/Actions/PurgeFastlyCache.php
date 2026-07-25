<?php

namespace App\Nova\Actions;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\DestructiveAction;
use Laravel\Nova\Actions\ActionResponse;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Jobs\PurgeFastlyCache as PurgeJob;

class PurgeFastlyCache extends DestructiveAction
{
    use InteractsWithQueue;
    use Queueable;

    /**
     * Perform the action on the given models.
     *
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $models->each(function (Item $item) {
            dispatch(new PurgeJob($item));
        });

        return ActionResponse::message('Images purged in the Fastly cache');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [];
    }
}
