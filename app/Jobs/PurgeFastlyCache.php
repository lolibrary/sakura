<?php

namespace App\Jobs;

use App\Models\Item;
use App\Services\Fastly\Fastly;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class PurgeFastlyCache implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Item $item)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $urls = $this->item->images->pluck('image');
        $urls->push($this->item->image);

        $urls->each(function (string $url) {
            // let's go purge everything
            Fastly::purge()->purgeSingleUrl(['cached_url' => cdn_link($url)]);
        });
    }
}
