<?php

namespace App\Models;

use App\Models\Traits\Collection;
use App\Models\Traits\DateHandling;
use Astrotomic\Translatable\Contracts\Translatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

/**
 * A base model for this application.
 *
 * @property string $id The UUID of this model.
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property string $url
 * @property string $view_url
 * @property string $edit_url
 *
 * @method static Model find(string $id)
 * @method static Model findOrFail(string $id)
 * @method static Model|\Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder where(string|array $column, string $operator = null, mixed $value = null)
 */
abstract class Model extends Eloquent
{
    use HasUuids, DateHandling, LogsActivity;

    /**
     * The namespace UUID used for {@see uuid5()}.
     *
     * @var string
     */
    public const NAMESPACE_UUID = '56195dda-e864-11e6-98d9-b980ab05cceb';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Remove auto-incrementing ID handling.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Remove all guarding from models.
     *
     * @var bool
     */
    protected static $unguarded = false;

    /**
     * Add timezones to date formats.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:sO';

    /**
     * Add the URL for every item to its array form.
     *
     * @var array
     */
    protected $appends = ['url', 'edit_url', 'view_url'];

    /**
     * The number of items to show per page.
     *
     * @var int
     */
    protected $perPage = 24;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Helper attribute for getting the URL to any model.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        $route = $this->getRouteShowName();

        return route($route, $this);
    }

    /**
     * Helper attribute for getting the URL to any model.
     *
     * @return string
     */
    public function getEditUrlAttribute(): string
    {
        $class = Str::plural(Str::lower(class_basename($this)));

        return route("filament.admin.resources.$class.edit", $this);
    }

    /**
     * Helper attribute for getting the URL to any model.
     *
     * @return string
     */
    public function getViewUrlAttribute(): string
    {
        $class = Str::plural(Str::lower(class_basename($this)));

        return route("filament.admin.resources.$class.view", $this);
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

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \App\Models\Collection
     */
    public function newCollection(array $models = []): Collection
    {
        return new Collection($models);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public function attributesToArray()
    {
        $array = parent::attributesToArray();

        if ($this instanceof Translatable) {
            $array = array_merge($array, $this->getTranslationsArray());
        }

        return $array;
    }
}
