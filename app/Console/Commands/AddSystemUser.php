<?php

namespace App\Console\Commands;

use App\Enums\Level;
use App\Enums\SystemUser;
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
        {--l|level=2000 : Access level - see App\\Enums\\Level}
        {--edit : Edit the user instead of deleting}
        {--no-info : Do not output user info on create/edit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a system user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $options = $this->validate();
        if ($options === false) {
            return 1; // exit with error.
        }

        $user = new User([
            'username' => $options['username'],
        ]);

        if ($this->option('edit')) {
            $user = User::username($options['username'])->first();

            if ($this->option('email') !== null) {
                $user->email = $this->option('email');
            }
        } else {
            $user->name = $options['username'];
            $user->forceFill([
                'name' => $options['username'],
                'email' => $options['email'],
            ]);
        }

        $user->forceFill([
            'level' => $options['level'],
            'password' => bcrypt(Str::random(64)),
            'email_verified_at' => now(),
        ]);

        $user->save();

        info(($this->option('edit') ? 'Edited user' : 'Created user') . ' ' . $options['username']);

        if (! $this->option('no-info')) {
            table(['key', 'value'], collect([
                'id' => $user->getKey(),
                'email' => $user->email,
                'username' => $user->username,
                'level' => $user->level->getLabel(),
                'verified' => 'true',
            ])->map(
                fn (string $value, string $key) =>
                compact('key', 'value'))->all()
            );
        }

        return 0;
    }

    protected function validate(): array | false
    {
        if (is_null($username = SystemUser::tryFrom($this->argument('username')))) {
            error("{$this->argument('username')} is not a valid system user.");
            return false;
        }

        if (is_null($level = Level::tryFrom((int) $this->option('level')))) {
            error("{$this->option('level')} is not a valid level.");
            return false;
        }

        $email = $this->option('email') ?? "admin+$username->value@lolibrary.org";
        $user = User::username($username->value)->first();

        if ($user !== null && ! $this->option('edit')) {
            error("User already exists, please use --edit");
            return false;
        }

        // if we're editing, make sure it exists.
        // if we're creating, make sure it doesn't conflict
        if ($user !== null) {
            if ($this->option('email')) {
                $check = User::email($this->option('email'))->first();

                if ($check !== null && $check->username !== $username->value) {
                    error("Cannot edit user - email already exists for user $user->username");
                    return false;
                }
            }

        } else {
            if (User::email($email)->exists()) {
                error('A user already exists with that email');
                return false;
            }

            if (User::username($username->value)->exists()) {
                error('A user already exists with that username');
                return false;
            }
        }

        return [
            'username' => $username->value,
            'email' => $email,
            'level' => $level,
        ];
    }
}
