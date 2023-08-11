<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class TextTool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lolibrary:text-tool {--dump}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dumps translation strings out of the DB, or reads them in.';

    /**
     * A list of all missing main images.
     *
     * @var array
     */
    protected $missing = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $defaultLocale = config('app.locale');
        $locales = array_keys(config('app.locales'));
        if ($this->option('dump')) {
            $this->info('Dumping strings from DB. App default language is: '.$defaultLocale);
        } else {

        }

    }

}
