<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    /**
     * Show a brand.
     *
     * @return Response
     */
    public function show(Brand $brand)
    {
        return redirect()->to(search_route(['brands' => [$brand->slug]]));
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
