<?php

namespace App\Http\Controllers\Items;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    /**
     * Show an item.
     *
     * @param \App\Models\Item $item
     * @return RedirectResponse|\Illuminate\View\View
     */
    public function show(Item $item)
    {
        if ($item->status === Status::Duplicate && $item->duplicate_url !== null) {
            return redirect($item->duplicate_url, status: 308); // permanent redirect.
        }

        if ($item->status !== Status::Published && auth()->guest()) {
            abort(404);
        }

        $item->load(Item::FULLY_LOAD);

        return view('items.show', compact('item'));
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
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function wishlist(Item $item)
    {
        $user = auth()->user();
        $attached = $user->updateWishlist($item);
        $status = $attached ? 'added' : 'removed';
        cache()->tags(['wishlist'])->forget($item->getKey());

        return back()->withStatus(trans("ui.wishlist.{$status}", ['item' => Str::limit($item->english_name, 28)]));
    }

    /**
     * Update a user's closet.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function closet(Item $item)
    {
        $user = auth()->user();
        $attached = $user->updateCloset($item);
        $status = $attached ? 'added' : 'removed';
        cache()->tags(['closet'])->forget($item->getKey());

        return back()->withStatus(trans("ui.closet.{$status}", ['item' => Str::limit($item->english_name, 28)]));
    }
}
