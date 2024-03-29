<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Return all tags, cached.
     *
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        return Tag::cached();
    }

    /**
     * Get a specific category.
     *
     * @param \App\Tag $tag
     * @return \App\Tag
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Search for a tag.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Tag[]|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required_without:q|string|min:1,max:30',
            'q' => 'required_without:search|string|min:1,max:30',
        ]);

        $search = $request->input('search') ?? $request->input('q');

        return Tag::orderBy('created_at')->where(function (Builder $query) use ($request, $search) {
            $query->where('slug', 'ilike', "%{$search}%")
                ->orWhere('name', 'ilike', "%{$search}%");
        })->paginate(100);
    }
}
