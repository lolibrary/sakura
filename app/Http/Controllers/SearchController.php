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
        return view('search', ['items' => [
            'brands' => Brand::cached(), 
            'categories' => Category::cached(), 
            'features' => Feature::cached(),
            'attributes' => Attribute::cached(),
            'colors' => Color::cached(),
            'tags' => Tag::cached(),]]);
    }
}
