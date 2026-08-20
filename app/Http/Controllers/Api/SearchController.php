<?php

namespace App\Http\Controllers\Api;

use App\Enums\Status;
use App\Http\Controllers\Controller as Base;
use App\Http\Requests\Api\SearchRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SearchController extends Base
{
    /**
     * An array of models that we allow searching on.
     *
     * @var array<class-string, string>
     */
    protected const array FILTERS = [
        Brand::class => 'brand',
        Category::class => 'categories',
        Color::class => 'colors',
        Feature::class => 'features',
        Tag::class => 'tags',
    ];

    /**
     * Search for items.
     *
     * @return LengthAwarePaginator<Item>
     */
    public function index(SearchRequest $request): LengthAwarePaginator
    {
        $query = Item::query();

        return $this->search($request, $query);
    }

    /**
     * Search for items.
     *
     * @param  Builder<Item>  $query
     * @return LengthAwarePaginator<Item>
     */
    public function search(SearchRequest $request, Builder $query): LengthAwarePaginator
    {
        $this->filters($request, $query);
        $this->years($request, $query);

        if (is_string($request->search) && strlen($request->search) > 0) {
            $search = '%'.$request->search.'%';

            $query->where(function (Builder $query) use ($search) {
                $query->where('english_name', 'ilike', $search);
                $query->orWhere('foreign_name', 'ilike', $search);
                $query->orWhere('product_number', 'ilike', $search);
                $query->orWhereRaw('english_name %> ?', [$search]);
                $query->orWhereRaw('foreign_name %> ?', [$search]);
                $query->orWhereRaw('product_number %> ?', [$search]);
            });
        }

        $query->orderBy(...(sorted($request->sort)));

        $query->where('status', Status::Published);

        $params = $this->formToQuery($request);

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

    /**
     * @return array<string, mixed>
     */
    protected function formToQuery(Request $request): array
    {
        $all_params = $request->all();

        $filtered = array_filter($all_params, function ($value, $key) {
            return ! (str_contains($key, '_matcher') && $value == 'OR');
        }, ARRAY_FILTER_USE_BOTH);

        return $filtered;
    }

    /**
     * Filter relationships.
     *
     * @param  Builder<Item>  $query
     */
    protected function filters(Request $request, Builder $query): void
    {
        foreach (static::FILTERS as $class => $relation) {
            [$singular, $plural] = [Str::singular($relation), Str::plural($relation)];

            $models = (array) $request->input($plural) ?? $request->input($singular);
            $matcher = $request->input($plural.'_matcher') ?? 'OR';

            if (count($models) > 0) {
                if ($matcher == 'AND') {
                    foreach ($models as $model) {
                        $query->whereHas($relation, function (Builder $query) use ($model) {
                            $query->where('slug', $model);
                        });
                    }

                } elseif ($matcher == 'NOT') {

                    $not_query = Item::query();
                    $not_query->whereHas($relation, function (Builder $not_query) use ($models) {
                        $not_query->whereIn('slug', $models);
                    })->select('id')->distinct();

                    $query->whereNotIn('id', $not_query);

                } elseif ($matcher == 'OR') {
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
     * @param  \App\Requests\SearchRequest|Request  $request
     * @return void
     */
    protected function years(Request $request, Builder $query)
    {
        $start_year = $request->input('start_year');
        $end_year = $request->input('end_year');
        $matcher = $request->input('year_matcher') ?? 'OR';

        if ($start_year && $end_year &&
            ! (($start_year == 1970 && $end_year == date('Y') + 3) ||
            ($end_year == 1970 && $start_year == date('Y') + 3))) {
            if ($matcher == 'OR') {
                $query->whereBetween('year', [$start_year, $end_year]);

            } elseif ($matcher == 'NOT') {
                $query->where(function ($query) use ($start_year, $end_year) {
                    $query->whereNotBetween('year', [$start_year, $end_year])
                        ->orWhereNull('year');
                });

            }
        }
    }
}
