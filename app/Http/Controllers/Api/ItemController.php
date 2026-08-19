<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemController extends Controller
{
    /**
     * Get all items in the database, paginated.
     *
     * @return \App\Item[]|LengthAwarePaginator
     */
    public function index()
    {
        return Item::drafts(false)->orderBy('published_at', 'desc')->paginate(24);
    }

    /**
     * Show a specific item. Explicitly uses the UUID.
     *
     * @return \App\Item
     */
    public function show(string $item)
    {
        /** @var \App\Item $model */
        $model = Item::findOrFail($item);

        if ($model->draft()) {
            throw (new ModelNotFoundException)->setModel(get_class($model), [$item]);
        }

        return $model->load(Item::FULLY_LOAD);
    }
}
