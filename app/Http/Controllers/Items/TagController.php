<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Show a tag.
     */
    public function show(Tag $tag): RedirectResponse
    {
        return redirect()->to(search_route(['tags' => [$tag->slug]]));
    }

    /**
     * Redirect to the search page.
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('search');
    }
}
