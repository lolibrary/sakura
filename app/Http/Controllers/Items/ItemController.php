<?php

namespace App\Http\Controllers\Items;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * @var string[]
     */
    protected const array Relations = [
        'attributes.translations',
        'brand.translations',
        'categories.translations',
        'colors.translations',
        'features.translations',
        'tags.translations',
        'publisher',
        'submitter',
    ];

    /**
     * Show an item.
     */
    public function show(string $slug): RedirectResponse|View
    {
        $item = $this->getCachedItem($slug);

        if (! is_null($response = $this->checkForDuplicates($item))) {
            return $response;
        }

        if ($item->status !== Status::Published && auth()->guest()) {
            abort(404);
        }

        return view('items.show', compact('item'));
    }

    protected function getCachedItem(string $slug): Item
    {
        /** @var Item $item */
        return cache()->tags(['item', 'slug'])->remember(
            "item:$slug",
            300,
            fn() => Item::with(static::Relations)->where('slug', $slug)->firstOrFail(),
        );
    }

    protected function checkForDuplicates(Item $item): ?RedirectResponse
    {
        if ($item->status === Status::Duplicate && $item->duplicate_url !== null) {
            // sanity check: make sure it was once published
            if ($item->metadata['previous_status'] !== Status::Published->value) {
                abort(404);
            }

            return redirect($item->duplicate_url, status: 308); // permanent redirect.
        }

        return null;
    }

    /**
     * Redirect to /search
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('search');
    }

    /**
     * Update a user's wishlist.
     */
    public function wishlist(Item $item): RedirectResponse
    {
        $user = auth()->user();
        $attached = $user->updateWishlist($item);
        $status = $attached ? 'added' : 'removed';
        cache()->tags(['wishlist'])->forget($item->getKey());

        return back()->withStatus(trans("ui.wishlist.{$status}", ['item' => Str::limit($item->english_name, 28)]));
    }

    /**
     * Update a user's closet.
     */
    public function closet(Item $item): RedirectResponse
    {
        $user = auth()->user();
        $attached = $user->updateCloset($item);
        $status = $attached ? 'added' : 'removed';
        cache()->tags(['closet'])->forget($item->getKey());

        return back()->withStatus(trans("ui.closet.{$status}", ['item' => Str::limit($item->english_name, 28)]));
    }
}
