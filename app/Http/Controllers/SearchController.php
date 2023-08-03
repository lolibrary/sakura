<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Tag;

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
            'brands' => Brand::cached(), 
            'categories' => Category::cached(), 
            'features' => Feature::cached(),
            'attributes' => Attribute::cached(),
            'colors' => Color::cached(),
            'tags' => Tag::cached(),],
        'items' => $paginator]);
    }
}
