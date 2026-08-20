<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
    /**
     * Show a brand.
     */
    public function show(Brand $brand): RedirectResponse
    {
        return redirect()->to(search_route(['brands' => [$brand->slug]]));
    }

    /**
     * Redirect to the search page.
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('search');
    }
}
