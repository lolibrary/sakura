<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Response;

class TagController extends Controller
{
    /**
     * Show a tag.
     *
     * @return Response
     */
    public function show(Tag $tag)
    {
        return redirect()->to(search_route(['tags' => [$tag->slug]]));
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
