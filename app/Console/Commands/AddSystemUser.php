<?php

namespace App\Console\Commands;

use App\Enums\Level;
use App\Models\User;
use Illuminate\Console\Command;

use Illuminate\Support\Str;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\table;

class AddSystemUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:system-user {username}
        {--e|email= : Full email address for this user}
        {--l|level=1000 : Access level - see App\\Enums\\Level}
        {--r|replace : Delete the user and start again}
        {--replace-id : Generate a new ID for the user, if replacing}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a system user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = null;
        $username = $this->argument('username');
        $email = $this->option('email') ?? "admin+$username@lolibrary.org";
        $level = Level::tryFrom((int)$this->option('level'));

        if ($this->option('replace')) {
            info("Replacing user $username");
            if ($original = User::where('username', $username)->first()) {
                info("Preserving ID: $original->id");
                $id = $original->id;
            }

            User::where('username', $username)->delete();
        }

        if (User::where('username', $username)->exists()) {
            error('A user already exists with that username');
            return;
        }

        if (User::where('email', $email)->exists()) {
            error('A user already exists with that email');
            return;
        }

        if ($level === null) {
            error('Invalid level, please try again');
            return;
        }

        $user = new User;

        $user->forceFill([
            'id' => $id,
            'name' => $username,
            'username' => $username,
            'email' => $email,
            'level' => $level,
            'password' => bcrypt(Str::random(64)),
            'email_verified_at' => now(),
        ]);

        $user->save();

        info("Created user");
        table(['key', 'value'], collect([
            'id' => $user->getKey(),
            'email' => $user->email,
            'username' => $user->username,
            'level' => $user->level->getLabel(),
            'verified' => 'true',
        ])->map(fn (string $value, string $key) => compact('key', 'value'))
            ->all());
    }
}
