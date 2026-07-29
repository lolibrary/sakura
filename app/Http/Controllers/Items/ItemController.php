<?php

namespace App\Http\Controllers\Items;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemStoreRequest;
use App\Http\Requests\Admin\ItemUpdateRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Item;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class ItemController extends Controller
{
    /**
     * Show an item.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Item $item)
    {
        $item->load(Item::FULLY_LOAD);

        if ($item->status !== Status::Published && auth()->guest()) {
            abort(404);
        }

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
