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
use App\Http\Requests\Api\SearchRequest;
use App\Http\Controllers\Api\SearchController as ApiSearchController;


class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $query = Item::query();
        $search = new ApiSearchController();
        $items = $search->search($request, $query);

        return view('search', ['sections' => [
            'categories' => Category::cached()->sortBy('name'), 
            'brands' => Brand::cached()->sortBy('name'), 
            'features' => Feature::cached()->sortBy('name'),
            'colors' => Color::cached()->sortBy('name'),
            'tags' => Tag::cached()->sortBy('name'),],
            'items' => $items]);
    }
}
