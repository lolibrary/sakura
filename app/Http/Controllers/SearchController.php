<?php

namespace App\Http\Controllers;

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
            'tags' => Tags::cached(),]]);
    }
}
