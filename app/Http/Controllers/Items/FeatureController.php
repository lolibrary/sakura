<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Item;

class FeatureController extends Controller
{
    /**
     * Show a feature.
     *
     * @param \App\Models\Feature $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        return redirect()->to(search_route(['features' => [$feature->slug]]));
    }

    /**
     * Redirect to the search page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('search');
    }
}
