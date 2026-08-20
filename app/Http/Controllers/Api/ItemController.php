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
     * @return LengthAwarePaginator<Item>
     */
    public function index()
    {
        return Item::query()
            ->with(Item::FULLY_LOAD)
            ->orderBy('published_at', 'desc')
            ->paginate(24);
    }

    /**
     * Show a specific item. Explicitly uses the UUID.
     */
    public function show(string $item): Item
    {
        /** @var Item $model */
        $model = Item::findOrFail($item);

        if ($model->draft()) {
            throw (new ModelNotFoundException)->setModel(get_class($model), [$item]);
        }

        return $model->load(Item::FULLY_LOAD);
    }
}
