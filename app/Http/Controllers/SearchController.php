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


class SearchController extends Controller
{
    public function index()
    {
        $query = Item::query();
        $query->orderBy(...(sorted('added_new')));

        $query->where('status', Item::PUBLISHED);

        $paginator = $query->paginate(24);

        $paginator->each(function (Item $item) {
            $item->image = Storage::cloud()->url($item->image);
            $item->makeVisible('image');

            if ($item->brand !== null) {
                $item->brand->image = Storage::cloud()->url($item->brand->image);
                $item->brand->makeVisible('image');
            }

            if ($item->category !== null) {
                $item->category->image = Storage::cloud()->url($item->category->image);
                $item->category->makeVisible('image');
            }
        });

        return view('search', ['sections' => [
            'brand' => Brand::cached(), 
            'category' => Category::cached(), 
            'features' => Feature::cached(),
            'colors' => Color::cached(),
            'tags' => Tag::cached(),],
            'items' => $paginator]);
    }
}
