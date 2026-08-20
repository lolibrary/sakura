<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\RedirectResponse;

class FeatureController extends Controller
{
    /**
     * Show a feature.
     */
    public function show(Feature $feature): RedirectResponse
    {
        return redirect()->to(search_route(['features' => [$feature->slug]]));
    }

    /**
     * Redirect to the search page.
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('search');
    }
}
