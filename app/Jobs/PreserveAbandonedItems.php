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

class PreserveAbandonedItems implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     */
    public function __invoke(): void
    {
        $query = Item::query()
            ->withoutEagerLoads()
            ->whereNotExists(function (Builder $query) {
                $query->select(DB::raw(1))->from('users')->whereColumn('items.user_id', 'users.id');
            })
            ->where('status', Status::Published);

        if (($count = $query->count()) > 0) {
            Log::info("found $count published items with no submitter, anonymising");

            $query->get()->each(function (Item $item) {
                Log::info('anonymising published post', [
                    'id' => $item->id,
                    'slug' => $item->slug,
                    'created_at' => $item->created_at->format(DateTimeInterface::RFC3339),
                    'updated_at' => $item->updated_at->format(DateTimeInterface::RFC3339),
                ]);

                $item->anonymize();
            });
        }
    }
}
