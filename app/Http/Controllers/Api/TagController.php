<?php

namespace App\Http\Controllers\Api;

use App\Contracts\VisibleTo;
use App\Models\Filters\VisibilityFilter;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TagController extends Controller
{
    /**
     * Return all tags, cached.
     *
     * @return Collection<Tag>
     *
     * @throws \Exception
     */
    public function index(): Collection
    {
        return Tag::cached()->filter(new VisibilityFilter);
    }

    public function show(Tag $tag): Tag
    {
        if (! $tag->isVisibleTo(auth()->user())) {
            abort(404);
        }

        return $tag;
    }

    /**
     * Search for a tag.
     *
     * @return LengthAwarePaginator<Tag>
     */
    public function search(Request $request): LengthAwarePaginator
    {
        $this->validate($request, [
            'search' => 'required_without:q|string|min:1,max:30',
            'q' => 'required_without:search|string|min:1,max:30',
        ]);

        $search = $request->input('search') ?? $request->input('q');

        return Tag::orderBy('created_at')->where(function (Builder $query) use ($search) {
            $query->where('slug', 'ilike', "%{$search}%")
                ->orWhere('name', 'ilike', "%{$search}%");
        })->paginate(100);
    }
}
