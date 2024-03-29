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
     * A list of all models we translate
     *
     * @var array
     */
    protected $tables = ['attribute', 'brand', 'category', 'color', 'feature', 'tag'];

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
            $this->info("Dumping strings from DB. App default language is $defaultLocale");
            foreach ($this->tables as $table) {
                $this->info("Dumping strings for ${table}_translations");
                $values =  DB::table("${table}_translations")->select("${table}_id as table_id", 'name')->where('locale', $defaultLocale)->orderBy('table_id')->get()->mapWithKeys(function ($item) use ($table) {
                    return [$item->table_id => $item->name];
                })->all();
                file_put_contents(resource_path("lang/models/$table/$defaultLocale.json"), json_encode($values, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ));
            }
        } else {
            $this->info("Loading strings from files. App secondary languages are ". implode(", ", $locales));
            foreach ($locales as $lang) {
                $this->info("Loading  $lang strings");
                foreach ($this->tables as $table) {
                    try {
                        $this->info("Loading strings for ${table}_translations");
                        $data = file_get_contents(resource_path("lang/models/$table/$lang.json"));
                        $values = json_decode($data, true);

                        $mapper = function($key, $value) use ($table, $lang){
                            return [
                                "${table}_id" => $key,
                                'locale' => $lang,
                                'name' => $value
                            ];
                        };
                        
                        $cleaned = array_filter($values);
                        $mapped = array_map($mapper, array_keys($cleaned), array_values($cleaned));

                        #TODO - this should use upsert once we're on Laravel 8
                        DB::table("${table}_translations")->insertOrIgnore($mapped);
                    } catch (Exception $e) {
                        $this->warn('Caught exception: ' .$e->getMessage());
                    }
                }
            }
        }

    }

}
