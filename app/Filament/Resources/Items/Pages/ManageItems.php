<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Resources\Items\ItemResource;
use App\Models\Item;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ManageItems extends ManageRecords
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(fn (): bool => auth()->user()?->can('create', Item::class) ?? false),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        /** @var Item $record */
        $record = $this->getRecord();

        $data['category_ids'] = $record->categories()->pluck('categories.id')->all();
        $data['feature_ids'] = $record->features()->pluck('features.id')->all();
        $data['color_ids'] = $record->colors()->pluck('colors.id')->all();
        $data['tag_ids'] = $record->tags()->pluck('tags.id')->all();
        $data['attribute_values'] = $record->attributes->map(fn ($attribute): array => [
            'attribute_id' => $attribute->id,
            'value' => $attribute->pivot->value,
        ])->values()->all();

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $relationshipData = $this->extractRelationshipData($data);

        $record = new Item($data);
        $record->status = Item::DRAFT;
        $record->save();

        $this->syncRelationships($record, $relationshipData);

        return $record;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        /** @var Item $record */
        $relationshipData = $this->extractRelationshipData($data);

        if ($record->published()) {
            unset($data['brand_id']);
            $relationshipData['category_ids'] = $record->categories()->pluck('categories.id')->all();
        }

        $record->fill($data);
        $record->save();

        $this->syncRelationships($record, $relationshipData, ! $record->published());

        return $record;
    }

    protected function extractRelationshipData(array &$data): array
    {
        $keys = [
            'category_ids',
            'feature_ids',
            'color_ids',
            'tag_ids',
            'attribute_values',
        ];

        $relationships = Arr::only($data, $keys);

        foreach ($keys as $key) {
            unset($data[$key]);
        }

        return $relationships;
    }

    protected function syncRelationships(Item $record, array $relationships, bool $syncCategory = true): void
    {
        $categoryIds = array_values(array_filter($relationships['category_ids'] ?? []));

        if ($syncCategory) {
            $record->categories()->sync($categoryIds);

            if ($categoryIds !== []) {
                $record->category_id = $categoryIds[0];
                $record->save();
            }
        }

        $record->features()->sync(array_values(array_filter($relationships['feature_ids'] ?? [])));
        $record->colors()->sync(array_values(array_filter($relationships['color_ids'] ?? [])));
        $record->tags()->sync(array_values(array_filter($relationships['tag_ids'] ?? [])));

        $attributeValues = collect($relationships['attribute_values'] ?? [])
            ->filter(fn (array $row): bool => filled($row['attribute_id'] ?? null) && filled($row['value'] ?? null))
            ->mapWithKeys(fn (array $row): array => [
                $row['attribute_id'] => ['value' => $row['value']],
            ])
            ->all();

        $record->attributes()->sync($attributeValues);
    }
}
