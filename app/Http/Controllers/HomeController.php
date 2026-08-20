<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @throws \Exception
     */
    public function homepage(): View
    {
        $brands = Brand::cached();
        $categories = Category::cached();
        $recent = cache()->remember('homepage.recent', 120, function () {
            return Item::with(Item::PARTIAL_LOAD)
                ->where('status', Status::Published)
                ->orderBy('published_at', 'desc')
                ->whereNotNull('image')
                ->whereDoesntHave('tags', function (Builder $query) {
                    $query->whereIn('slug', ['partial', 'sensitive-content']);
                })
                ->take(15)
                ->get();
        });

        return view('homepage', compact('brands', 'categories', 'recent'));
    }

    public function lang(Request $request): RedirectResponse
    {
        $lang = $request->query('lang');
        $request->session()->put('lang', $lang);

        return back();
    }
}
