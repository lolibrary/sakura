<?php

namespace App\Jobs;

use App\Enums\Status;
use App\Models\Item;
use DateTimeInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteAbandonedDrafts implements ShouldQueue
{
    use Queueable, Dispatchable;

    /**
     * Execute the job.
     */
    public function __invoke(): void
    {
        $query = Item::query()
            ->withoutEagerLoads()
            ->whereNotExists(function (Builder $query) {
                $query->select(DB::raw(1))->from('users')->whereColumn('items.user_id', 'users.id');
            })
            ->whereIn('status', [
                Status::Draft,
                Status::ReadyForReview,
                Status::ChangesRequested,
            ]);

        if (($count = $query->count()) > 0) {
            Log::info("found $count draft items with no user, deleting");

            $query->get()->each(function (Item $item) {
                Log::info('deleting abandoned draft', [
                    'id' => $item->id,
                    'slug' => $item->slug,
                    'name' => $item->english_name,
                    'status' => $item->status->getName(),
                    'created_at' => $item->created_at->format(DateTimeInterface::RFC3339),
                    'updated_at' => $item->updated_at->format(DateTimeInterface::RFC3339),
                ]);

                // allow all of the relationship deletes to occur.
                $item->delete();
            });
        }
    }
}
