<?php

namespace App\Jobs;

use App\Enums\Status;
use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Queue\Queueable;

class MarkInactiveEntries implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the job.
     */
    public function __invoke(): void
    {
        $this->query()
            ->update([
                'status' => Status::Inactive,
            ]);
    }

    public function query(): Builder
    {
        return Item::query()
            ->withoutEagerLoads()
            ->where('status', Status::Draft)
            ->where('updated_at', '<', now()->subYear())
            ->orWhere(function (Builder $builder) {
                $builder->whereNull('updated_at')
                    ->where('created_at', '<', now()->subYear());
            });
    }
}
