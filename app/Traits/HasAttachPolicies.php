<?php

namespace App\Traits;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Tag;
use App\Models\User;

/**
 * Ties the relation attachment options to the 'update' ability on a policy, for simplicity.
 */
trait HasAttachPolicies
{
    abstract public function update(User $user, Item $item): bool;

    public function attachAnyTag(User $user, Item $item): bool
    {
        return $this->update($user, $item);
    }

    public function detachTag(User $user, Item $item, Tag $tag): bool
    {
        return $this->update($user, $item);
    }

    public function attachAnyAttribute(User $user, Item $item):bool
    {
        return $this->update($user, $item);
    }

    public function detachAttribute(User $user, Item $item, Attribute $attribute): bool
    {
        return $this->update($user, $item);
    }

    public function attachAnyColor(User $user, Item $item): bool
    {
        return $this->update($user, $item);
    }

    public function detachColor(User $user, Item $item, Color $color): bool
    {
        return $this->update($user, $item);
    }

    public function attachAnyFeature(User $user, Item $item): bool
    {
        return $this->update($user, $item);
    }

    public function detachFeature(User $user, Item $item, Feature $feature): bool
    {
        return $this->update($user, $item);
    }

    public function attachAnyCategory(User $user, Item $item): bool
    {
        return $this->update($user, $item);
    }

    public function detachCategory(User $user, Item $item, Category $category): bool
    {
        return $this->update($user, $item);
    }
}
