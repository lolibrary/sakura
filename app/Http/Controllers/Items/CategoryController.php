<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Show a category.
     *
     * @return Response
     */
    public function show(Category $category)
    {
        return redirect()->to(search_route(['categories' => [$category->slug]]));
    }

    /**
     * Redirect to the search page.
     *
     * @return Response
     */
    public function index()
    {
        return redirect()->route('search');
    }
}
