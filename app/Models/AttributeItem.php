<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Models\Concerns\LogsActivity;

#[Fillable('attribute_id', 'item_id', 'value')]
class AttributeItem extends Pivot
{
    use LogsActivity;

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function beforeActivityLogged(Activity $activity, string $eventName): void
    {
        $activity->description = "ui.audit.events.$eventName";
        $activity->attribute_changes ??= collect();
        $activity->attribute_changes->put('value', $this->value);
        $activity->properties = collect([
            'attribute_id' => $this->attribute_id,
            'item_id' => $this->item_id,
        ]);
    }
}
