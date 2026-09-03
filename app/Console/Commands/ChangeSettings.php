<?php

namespace App\Console\Commands;

use App\Enums\Settings\Setting;
use App\Enums\Settings\Type;
use App\Models\SiteSetting;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;
use function Laravel\Prompts\error;

#[Signature('settings:change
    {setting : The setting to add/edit.}
    {value : The value of this setting, as JSON.}')]
#[Description('Change a setting via its ID, e.g. settings:change tooltip.english_name ""')]
class ChangeSettings extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = $this->argument('setting');

        if (is_null($setting = Setting::tryFrom($id))) {
            error("Unknown setting: $id");
            return;
        }

        $value = match ($setting->type()) {
            Type::Toggle => $this->argument('value') === 'true',
            default => $this->argument('value'),
        };

        SiteSetting::updateOrCreate(
            ['setting' => $setting->value],
            ['value' => $value],
        );

        info("Updated $setting->value to $value");

        app('settings')->forget();

        info('Flushed settings cache');
    }
}
