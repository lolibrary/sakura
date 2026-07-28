<?php

namespace App\Console\Commands;

use App\Models\Attribute;
use App\Models\Item;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;

class ItemInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:info {id} {--cached}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch info for item relations from the cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** @var Item $item */
        $item = Item::findOrFail($this->argument('id'));

        if ($this->option('cached')) {
            if (is_null($cached = cache()->get($item->getCacheKey()))) {
                info("No cache found for item $item->id");
                return;
            }

            if (!$cached instanceof Item) {
                info("Cached entity is not an item");
                return;
            }

            $item = $cached;
        }

        $info = [
            "categories {$item->categories->map->slug}",
            "features {$item->features->map->slug}",
            "tags {$item->tags->map->slug}",
            "colors {$item->colors->map->slug}",
            "attributes " . $item->attributes->map(fn (Attribute $attr) => "$attr->slug:{$attr->pivot->value}"),
        ];

        info(collect($info)->map(fn (string $v) => $this->option('cached') ? "$v (cached)" : $v)->join("\n"));
    }
}
