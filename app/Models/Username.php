<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable('username')]
class Username extends Model
{
    use HasUuids, SoftDeletes;

    protected $primaryKey = 'username';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
