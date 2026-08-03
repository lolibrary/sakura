<?php

namespace App\Console\Commands;

use App\Models\Brand;
use Illuminate\Console\Command;
use function Laravel\Prompts\task;

class DumpRelations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dump-relations {dsn}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump categories, brands, tags etc in an SQL file for testing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tables = collect([
            'attributes',
            'brands',
            'categories',
            'colors',
            'features',
            'tags',
        ]);

        $translations = $tables->map(
            fn(string $name): string => str($name)->singular() . '_translations'
        );

        $tables->push(...$translations->all());

        $command = 'pg_dump "' . $this->argument('dsn') .'" ' .
            '--data-only -t ' . $tables->join(' -t ') . ' > ' . database_path('queries/relations.sql');

        task(
            label: 'Running '. $command,
            callback: fn() => exec($command),
        );

    }
}
