<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Models\Filters\VisibilityFilter;
use Illuminate\Database\Eloquent\Collection;

class BrandController extends Controller
{
    /**
     * Return all brands, cached.
     *
     * @return Collection<Brand>
     *
     * @throws \Exception
     */
    public function index(): Collection
    {
        return Brand::cached()->filter(new VisibilityFilter);
    }

    public function show(Brand $brand): Brand
    {
        return $brand;
    }
}
