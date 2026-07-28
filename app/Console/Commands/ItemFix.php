<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;

class ItemFix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:fix {id} {--f|force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attempt to re-create the relations on an item that broke';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** @var Item $item */
        $item = Item::findOrFail($this->argument('id'));

        if (is_null($cached = cache()->get($item->getCacheKey()))) {
            info("No cache found for item $item->id");
            return;
        }

        if (!$cached instanceof Item) {
            info("Cached entity is not an item");
            return;
        }

        // print info
        info('db item:');
        $this->call('item:info', ['id' => $item->id, '--cached' => false]);

        info('cached item:');
        $this->call('item:info', ['id' => $item->id, '--cached' => true]);

        if (! $this->option('force')) {
            confirm(label: 'Continue?', required: true);
        }

        info('Syncing relations');

        $item->categories()->sync($cached->categories);
        $item->features()->sync($cached->features);
        $item->tags()->sync($cached->tags);
        $item->colors()->sync($cached->colors);

        if ($cached->attributes->count() > 0) {
            $map = [];

            foreach ($cached->attributes as $pivot) {
                $map[$pivot->id] = ['value' => $pivot->pivot->value];
            }

            $item->attributes()->sync($map);
        }


    }
}
