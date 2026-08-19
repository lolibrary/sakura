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
     * Show an item.
     *
     * @return RedirectResponse|View
     */
    public function show(Item $item)
    {
        if ($item->status === Status::Duplicate && $item->duplicate_url !== null) {
            // sanity check: make sure it was once published
            if ($item->metadata['previous_status'] !== Status::Published->value) {
                abort(404);
            }

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
     * @return RedirectResponse
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
     * @return RedirectResponse
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
