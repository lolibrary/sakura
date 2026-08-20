<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class ColorController extends Controller
{
    /**
     * Show a color.
     */
    public function show(Color $color): RedirectResponse
    {
        return redirect()->to(search_route(['colors' => [$color->slug]]));
    }

    /**
     * Redirect to the search page.
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('search');
    }
}
