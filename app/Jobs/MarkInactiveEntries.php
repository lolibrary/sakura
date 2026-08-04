<?php

namespace App\Jobs;

use App\Enums\Status;
use App\Enums\SystemUser;
use App\Models\Item;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Queue\Queueable;
use RuntimeException;

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
        $user = User::system(SystemUser::Amy);

        return Item::query()
            ->withoutEagerLoads()
            ->where('user_id', '!=', $user->getKey())
            ->where('status', Status::Draft)
            ->where('updated_at', '<', now()->subYear())
            ->orWhere(function (Builder $builder) {
                $builder->whereNull('updated_at')
                    ->where('created_at', '<', now()->subYear());
            });
    }
}
