<?php

namespace App\Http\Controllers\Api;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Collection;

class FeatureController extends Controller
{
    /**
     * Return all features, cached.
     *
     * @return Collection<Feature>
     *
     * @throws \Exception
     */
    public function index(): Collection
    {
        return Feature::cached();
    }

    public function show(Feature $feature): Feature
    {
        return $feature;
    }
}
