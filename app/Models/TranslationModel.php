<?php

namespace App\Models;

use App\Models\Traits\Collection;
use App\Models\Traits\DateHandling;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Str;

/**
 * A base model for this application.
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property string $url
 * @property string $edit_url
 *
 * @method static Model find(string $id)
 * @method static Model findOrFail(string $id)
 * @method static Model|\Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder where(string|array $column, string $operator = null, mixed $value = null)
 */
abstract class TranslationModel extends Eloquent
{
    use DateHandling;

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

}
