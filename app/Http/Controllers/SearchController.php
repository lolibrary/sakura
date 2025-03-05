<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Color;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use App\Http\Requests\Api\SearchRequest;
use App\Http\Controllers\Api\SearchController as ApiSearchController;


class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $items = $this->post($request);
        $filters = $this->get_or_make_filters($request);
        $sorts = sort_options();

        return view('search', ['filters' => $filters,'items' => $items, 'sorts' => $sorts]);
    }

    public function post(SearchRequest $request) {
        $query = Item::query();
        $search = new ApiSearchController();
        $items = $search->search($request, $query);

        return view('components.search-results', ['items' => $items, 'max_year' => (date('Y') + 3)]);
    }

    public function get_or_make_filters(SearchRequest $request) {
        // Closure so we don't have to edit this multiple places if things change
        $make_filters = function() {
            return view('components.filters', ['sections' => [
                'categories' => Category::cached()->sortBy('name'), 
                'brands' => Brand::cached()->sortBy('name'), 
                'features' => Feature::cached()->sortBy('name'),
                'colors' => Color::cached()->sortBy('name'),
                'tags' => Tag::cached()->sortBy('name'),]
            ])->render();
        };

        // Check if there are any filters set. If not, we can use cached renders.
        // 'search' doesn't count because it doesn't affect the filter view.
        $params = $request->all();
        $count = count($params);

        if ($count == 0 || ($count == 1 && array_key_exists('search', $params))) {
            $locale = App::getLocale();
            $filters = cache()->tags(['filters'])->get($locale);
            if (!$filters) {
                $filters = $make_filters();
                cache()->tags(['filters'])->forever($locale, $filters);
                return $filters;
            } else {
                return $filters;
            }
        } else {
            return $make_filters();
        }
    }
}
