<?php

namespace App\Console\Commands;

use App\Enums\Status;
use App\Models\Item;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;
use function Laravel\Prompts\spin;

class ItemCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fully load and cache pending items';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $items = Item::with(Item::FULLY_LOAD)
            ->whereIn('status', [Status::ReadyForReview, Status::ChangesRequested])
            ->get();

        spin(fn() => $items->each(function (Item $item) {
            cache()->forever($item->getCacheKey(), $item);
        }), 'Caching pending items');

        info('Done');
    }
}
