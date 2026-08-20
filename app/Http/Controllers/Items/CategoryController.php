<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Show a category.
     */
    public function show(Category $category): RedirectResponse
    {
        return redirect()->to(search_route(['categories' => [$category->slug]]));
    }

    /**
     * Redirect to the search page.
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('search');
    }
}
