<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
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
        return Brand::cached();
    }

    public function show(Brand $brand): Brand
    {
        return $brand;
    }
}
