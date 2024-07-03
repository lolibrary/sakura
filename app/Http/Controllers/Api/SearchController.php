<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Base;
use App\Http\Requests\Api\SearchRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SearchController extends Base
{
    /**
     * An array of models that we allow searching on.
     *
     * @var string[]
     */
    protected const FILTERS = [
        Brand::class => 'brand',
        Category::class => 'categories',
        Color::class => 'colors',
        Feature::class => 'features',
        Tag::class => 'tags',
    ];

        /**
     * Search for items.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\App\Item[]
     */
    public function search_index(SearchRequest $request)
    {
        $query = Item::query();
        return search($request, $query);
    }
    /**
     * Search for items.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\App\Item[]
     */
    public function search(SearchRequest $request, Builder $query)
    {
        $this->filters($request, $query);
        $this->years($request, $query);

        if (is_string($request->search) && strlen($request->search) > 0) {
            $search = '%' . $request->search . '%';

            $query->where(function (Builder $query) use ($search) {
                $query->where('english_name', 'ilike', $search);
                $query->orWhere('foreign_name', 'ilike', $search);
                $query->orWhere('product_number', 'ilike', $search);
                $query->orWhereRaw('english_name %> ?',[$search]);
                $query->orWhereRaw('foreign_name %> ?', [$search]);
                $query->orWhereRaw('product_number %> ?', [$search]);
            });
        }

        $query->orderBy(...(sorted('added_new')));

        $query->where('status', Item::PUBLISHED);

        $params = $this->form_to_query($request);

        $paginator = $query->paginate(24)->appends($params);

        $paginator->each(function (Item $item) {
            if ($item->image !== null) { 
                $item->makeVisible('image');
                    $item->image = Storage::cloud()->url($item->image);
                    $item->makeVisible('image');
                }

            if ($item->brand !== null) {
                $item->brand->image = Storage::cloud()->url($item->brand->image);
                $item->brand->makeVisible('image');
            }

            if ($item->category !== null) {
                $item->category->image = Storage::cloud()->url($item->category->image);
                $item->category->makeVisible('image');
            }
        });

        return $paginator;
    }

    protected function form_to_query(Request $request)
    {
        $all_params = $request->all();
        
        $filtered = array_filter($all_params, function($value, $key) { return !(str_contains($key, '_matcher') && $value == 'OR'); }, ARRAY_FILTER_USE_BOTH);

        return  $filtered;
    }

    /**
     * Filter relationships.
     *
     * @param \App\Requests\SearchRequest|\Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    protected function filters(Request $request, Builder $query)
    {
        foreach (static::FILTERS as $class => $relation) {
            [$singular, $plural] = [Str::singular($relation), Str::plural($relation)];

            $models = (array) $request->input($plural) ?? $request->input($singular);
            $matcher = $request->input($plural . "_matcher") ?? "OR";

            if (count($models) > 0) {
                if ($matcher == "AND") {
                    foreach ($models as $model) {
                        $query->whereHas($relation, function (Builder $query) use ($model) {
                            $query->where('slug', $model);
                        });
                    }

                } elseif ($matcher == "NOT") {

                    $not_query = Item::query();
                    $not_query->whereHas($relation, function (Builder $not_query) use ($models) {
                        $not_query->whereIn('slug', $models);
                    })->select('id')->distinct();

                    $query->whereNotIn('id', $not_query);

                } elseif ($matcher == "OR") {
                    $query->whereHas($relation, function (Builder $query) use ($models) {
                        $query->whereIn('slug', $models);
                    });
                }
                
            }
        }
    }

    /**
     * Filter on year.
     *
     * @param \App\Requests\SearchRequest|\Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    protected function years(Request $request, Builder $query)
    {
        $start_year = $request->input('start_year');
        $end_year = $request->input('end_year');
        $matcher = $request->input("year_matcher") ?? "OR";

        if ($start_year && $end_year) {
            if ($matcher == "OR") { 
                $query->whereBetween('year', [$start_year, $end_year]);

            } elseif ($matcher == "NOT") {
                $query->where(function ($query) use ($start_year, $end_year) {
                    $query->whereNotBetween('year', [$start_year, $end_year])
                          ->orWhereNull('year');
                });

            }
        }
    }
}
