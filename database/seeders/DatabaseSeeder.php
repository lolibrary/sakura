<?php

namespace Database\Seeders;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Kernel $kernel): void
    {
        // seed the system users.
        $kernel->call('app:setup-system-users');

        // next, seed relations
        DB::unprepared(file_get_contents(database_path('queries/relations.sql')));

        // misc seeders
        $this->call(InstructionSeeder::class);
    }
}
