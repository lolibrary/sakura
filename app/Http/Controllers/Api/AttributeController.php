<?php

namespace App\Http\Controllers\Api;

use App\Models\Attribute;
use App\Models\Filters\VisibilityFilter;
use Illuminate\Database\Eloquent\Collection;

class AttributeController extends Controller
{
    /**
     * Return all attributes, cached.
     *
     * @return Collection<Attribute>
     *
     * @throws \Exception
     */
    public function index(): Collection
    {
        return Attribute::cached()->filter(new VisibilityFilter);
    }

    public function show(Attribute $attribute): Attribute
    {
        return $attribute;
    }
}
