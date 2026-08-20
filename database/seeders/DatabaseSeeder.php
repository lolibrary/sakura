<?php

namespace Database\Seeders;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Kernel $kernel): void
    {
        // seed the system users.
        $kernel->call('app:setup-system-users');

        $contents = file_get_contents(database_path('queries/relations.sql'));

        if ($contents === false) {
            error('unable to load queries/relations.sql');

            return;
        }

        // next, seed relations
        DB::unprepared($contents); /** @phpstan-ignore argument.type */

        // misc seeders
        $this->call(InstructionSeeder::class);
    }
}
