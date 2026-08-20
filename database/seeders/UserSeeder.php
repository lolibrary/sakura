<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Kernel $kernel): void
    {
        // seed the system users.
        $kernel->call('app:setup-system-users');

        // make a bunch of different types of user
        User::factory()->developer()->count(2)->make();
        User::factory()->admin()->make();
        User::factory()->trusted()->count(3)->make();
        User::factory()->senior()->count(3)->make();
        User::factory()->count(10)->make();
    }
}
