<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use GuzzleHttp\Client;

class ItemMissingRelations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Item $item)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function __invoke(): void
    {
        $webhook = config('services.discord.webhooks.missing-data');

        $extra = "none (sorry!)";
        if (! is_null($cached = cache()->get($this->item->getCacheKey()))) {
            $extra = implode(", ", [
                "categories: {$cached->categories->count()}",
                "tags: {$cached->tags->count()}",
                "features: {$cached->features->count()}",
                "colors: {$cached->colors->count()}",
                "attributes: {$cached->attributes->count()}",
            ]) . "\nto fix: `php artisan item:fix {$cached->id}`";

        }

        $msg = <<<EOD
        ### relation bug: {$this->item->english_name}
        cached data: $extra

        EOD;

        $client = new Client();
        $res = $client->request('POST', $webhook, ["json" => ["content" => $msg]]);

        if ($res->getStatusCode() >= 400) {
            $this->fail(new \RuntimeException("Failed to message discord"));
        }
    }
}
