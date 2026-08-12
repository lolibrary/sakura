<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Username extends Model
{
    use HasUuids;

    protected $primaryKey = 'username';

    protected $fillable = ['username'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
