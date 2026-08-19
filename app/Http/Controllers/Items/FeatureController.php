<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Response;

class FeatureController extends Controller
{
    /**
     * Show a feature.
     *
     * @return Response
     */
    public function show(Feature $feature)
    {
        return redirect()->to(search_route(['features' => [$feature->slug]]));
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
