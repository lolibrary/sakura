<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Response;

class ColorController extends Controller
{
    /**
     * Show a color.
     *
     * @return Response
     */
    public function show(Color $color)
    {
        return redirect()->to(search_route(['colors' => [$color->slug]]));
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
