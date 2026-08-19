<?php

namespace App\Models;

use App\Models\Traits\Collection;
use App\Models\Traits\DateHandling;
use App\Models\Traits\HasPivot;
use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Attributes\DateFormat;
use Illuminate\Database\Eloquent\Attributes\RouteKey;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;
use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;

/**
 * A base model for this application.
 *
 * @property string $id The UUID of this model.
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property string $url
 * @property string $view_url
 * @property string $edit_url
 *
 * @method static static find(string $id)
 * @method static static findOrFail(string $id)
 * @method static static|\Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder<static> where(string|array $column, string $operator = null, mixed $value = null)
 */
#[Appends('url', 'edit_url', 'view_url')]
#[RouteKey('slug')]
#[CollectedBy(Collection::class)]
#[DateFormat('Y-m-d H:i:sO')]
abstract class Model extends Eloquent
{
    use HasUuids, DateHandling, LogsActivity, HasPivot;

    /**
     * The number of items to show per page.
     *
     * @var int
     */
    protected $perPage = 24;


    public function url(): AttributeCast
    {
        $route = $this->getRouteShowName();

        return AttributeCast::get(fn() => route($route, $this));
    }

    public function editUrl(): AttributeCast
    {
        $class = Str::plural(Str::lower(class_basename($this)));

        return AttributeCast::get(fn() => route("filament.admin.resources.$class.edit", $this));
    }

    public function viewUrl(): AttributeCast
    {
        $class = Str::plural(Str::lower(class_basename($this)));

        return AttributeCast::get(fn() => route("filament.admin.resources.$class.view", $this));
    }

    /**
     * Default to the model name, lowercase and plural.
     *
     * @return string
     */
    protected function getRouteShowName(): string
    {
        $class = class_basename($this);

        return Str::plural(Str::lower($class)).'.show';
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
