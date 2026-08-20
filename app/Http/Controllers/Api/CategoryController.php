<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Filters\VisibilityFilter;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    /**
     * Return all categories, cached.
     *
     * @return Collection<Category>
     *
     * @throws \Exception
     */
    public function index(): Collection
    {
        return Category::cached()->filter(new VisibilityFilter);
    }

    public function show(Category $category): Category
    {
        return $category;
    }
}
