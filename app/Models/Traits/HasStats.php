<?php

namespace App\Models\Traits;

use App\Enums\Status;

trait HasStats
{
    public function publishedItems(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::Published)->count();
    }

    public function changesRequested(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::ChangesRequested)->count();
    }

    public function draftsWaiting(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::Draft)->count();
    }

    public function pendingItems(): int
    {
        return $this->items()->withoutEagerLoads()->where('status', Status::ReadyForReview)->count();
    }
}
