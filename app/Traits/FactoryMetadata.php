<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait FactoryMetadata
{
    /**
     * @param array<string, mixed> $metadata
     * @return $this
     */
    public function metadata(array $metadata): static
    {
        return $this->state(fn (array $attributes) => [
            'metadata' => $this->mutateMetadata($attributes['metadata'] ?? new Collection, $metadata),
        ]);
    }

    /**
     * @param Collection $collection
     * @param array<string, mixed> $mutations
     * @return Collection
     */
    protected function mutateMetadata(Collection $collection, array $mutations): Collection
    {
        foreach ($mutations as $key => $value) {
            $collection->put($key, $value);
        }

        return $collection;
    }
}
