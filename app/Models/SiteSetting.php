<?php

namespace App\Models;

use App\Enums\Settings\Setting;
use App\Enums\Settings\Section;
use App\Enums\Settings\Type;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;

/**
 * @property-read string $setting
 * @property-read mixed $value
 */
#[Fillable('setting', 'value')]
class SiteSetting extends Eloquent
{
    use HasUuids, LogsActivity;

    public function casts(): array
    {
        return [
            'type' => Type::class,
            'section' => Section::class,
            'setting' => Setting::class,
            'value' => 'json:unicode',
        ];
    }
}
