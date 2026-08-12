<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Username extends Model
{
    use HasUuids, SoftDeletes;

    protected $primaryKey = 'username';

    protected $fillable = ['username'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
