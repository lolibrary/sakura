<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
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

        $brands = Brand::with('translations')->get();
        $categories = Category::with('translations')->get();
        $recent = Item::with(Item::PARTIAL_LOAD)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->whereNotNull('image')
            ->whereDoesntHave('tags', function (Builder $query) {
                $query->whereIn('slug', ['partial', 'sensitive-content']);
            })
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
