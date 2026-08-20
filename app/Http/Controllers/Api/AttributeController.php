<?php

namespace App\Http\Controllers\Api;

use App\Models\Attribute;
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
        return Attribute::cached();
    }

    public function show(Attribute $attribute): Attribute
    {
        return $attribute;
    }
}
