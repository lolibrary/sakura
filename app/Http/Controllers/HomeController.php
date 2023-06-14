<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        // todo: make this a static ::homepage() method
        $posts = Post::query()
            ->with('user')
            ->whereNotNull('published_at')
            ->take(3)
            ->orderBy('published_at', 'desc')
            ->get();

        $brands = Brand::all();
        $categories = Category::all();
        $recent = Item::with(Item::PARTIAL_LOAD)
            ->drafts(false)
            ->orderBy('published_at', 'desc')
            ->take(15)
            ->get();

        return view('homepage', compact('posts', 'brands', 'categories', 'recent'));
    }

    public function set_lang(Request $request)
    {
        $lang = $request->query('lang');
        $request->session()->put('lang', $lang);
        return back();
    }
}
