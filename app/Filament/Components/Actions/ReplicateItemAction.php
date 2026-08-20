<?php

namespace App\Filament\Components\Actions;

use App\Models\Attribute;
use App\Models\Item;
use Filament\Actions\ReplicateAction;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;

class ReplicateItemAction
{
    public static function make(): ReplicateAction
    {
        return ReplicateAction::make()
            ->icon(Heroicon::OutlinedClipboardDocument)
            ->color('gray')
            ->excludeAttributes([
                'slug',
                'publisher_id',
                'user_id',
                'published_at',
                'status',
                'created_at',
                'updated_at',
            ])
            ->mutateRecordDataUsing(function (array $data): array {
                $data['user_id'] = auth()->id();

                return $data;
            })
            ->after(function (Item $record, Item $replica): void {
                DB::transaction(function () use ($record, $replica) {
                    $replica->categories()->sync($record->categories);
                    $replica->features()->sync($record->features);
                    $replica->colors()->sync($record->colors);
                    $replica->tags()->sync($record->tags);
                    $replica->attributes()->sync(
                        $record->attributes
                            ->mapWithKeys(fn (Attribute $attr) => [
                                $attr->id => [
                                    'value' => $attr->value,
                                ],
                            ])
                    );
                });

            })
            ->successRedirectUrl(fn (Item $replica) => $replica->view_url);
    }
}
