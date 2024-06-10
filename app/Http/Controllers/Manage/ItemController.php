<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Item;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use App\Http\Requests\Api\SearchRequest;
use App\Http\Controllers\Api\SearchController as ApiSearchController;

class ItemController extends Controller
{
    /**
     * Show a paginated list of items.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage(SearchRequest $request)
    {
        $items = $this->page($request);
        $filters = $this->get_or_make_filters($request);

        return view('search', ['filters' => $filters,'items' => $items]);
    }

    /**
     * Show a paginated list of items.
     *
     * @return \Illuminate\Http\Response
     */
    public function page(SearchRequest $request)
    {
        $query = Item::query();
        $search = new ApiSearchController();
        $items = $search->search($request, $query);

        return view('items.table', ['items' => $items]);
    }

    public function get_or_make_filters(SearchRequest $request) {
        // Closure so we don't have to edit this multiple places if things change
        $make_filters = function() {
            $make_status = function($item){
                return (object) ['slug' => Str::slug($item), 'name' => $item];
            };

            return view('components.filters', ['sections' => [
                'status' => array_map($make_status, array_values(STATUS)),
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

     /**
     * Edit an item.
     *
     * @param \App\Models\Item $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(string $id)
    {
        $this->user = auth()->user();
        $item = Item::find($id);

        if ($item->published() && ! $this->user->senior()) {
            return back()->withErrors('Your level is not allowed to edit items once published!');
        }

        if ($item->submitter && ! $item->submitter->is($this->user) && ! $this->user->senior()) {
            return back()->withErrors("You are not allowed to edit someone else's submission.");
        }

        return view('items.edit', [
            'item' => $item->load(Item::FULLY_LOAD),
            'attributes' => Attribute::all(),
            'categories' => Category::cached()->sortBy('name'), 
            'brands' => Brand::cached()->sortBy('name'), 
            'features' => Feature::cached()->sortBy('name'),
            'colors' => Color::cached()->sortBy('name'),
            'tags' => Tag::cached()->sortBy('name'),
            'currencies' => Item::CURRENCIES,
        ]);
    }

    /**
     * Create an item.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        return view('items.create', [
            'attributes' => Attribute::all(),
            'categories' => Category::cached()->sortBy('name'), 
            'brands' => Brand::cached()->sortBy('name'), 
            'features' => Feature::cached()->sortBy('name'),
            'colors' => Color::cached()->sortBy('name'),
            'tags' => Tag::cached()->sortBy('name'),
            'currencies' => Item::CURRENCIES,
        ]);
    }

    /**
     * Create an item in the DB.
     *
     * @param \App\Http\Requests\ItemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $brand = Brand::findOrFail($request->brand);

            // handle the main image.
            if ($request->image instanceof UploadedFile) {
                $image = Image::from($request->image);
            } else {
                $image = Image::default();
            }

            // handle the extra images
            $images = collect($request->images)->map(function (UploadedFile $file) {
                $image = Image::from($file);

                return $image->id;
            });

            $item = new Item($request->only([
                'english_name',
                'foreign_name',
                'notes',
                'year',
                'product_number',
                'price',
                'currency',
            ]));
            $item->brand()->associate($brand);
            $item->categories()->attach($request->categories);
            $item->image()->associate($image);
            $item->submitter()->associate(auth()->user());
            $item->status = Item::DRAFT;
            $item->slug = Item::slug($item);
            $item->save();
            // now we can add features, attributes and images.
            if ($images) {
                $item->images()->attach($images->all());
            }
            $item->features()->attach($request->features);
            $item->colors()->attach($request->colors);
            $item->tags()->attach($request->tags);
            $item->attributes()->attach(
                collect($request->input('attributes'))
                    ->filter()
                    ->map(function ($value, $key) {
                        return ['attribute_id' => $key, 'value' => $value];
                    }
                    )
            );
        });

        return redirect()->route('items.show', $item);
    }

    /**
     * Update an item in the DB.
     *
     * @param \App\Http\Requests\Admin\ItemUpdateRequest $request
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, String $id)
    {
        $item = Item::find($id);

        /** @var \App\Models\User $user */
        $user = auth()->user();
        $allowed = $item->canEdit($user);
        if (! $allowed) {
            return back()->withErrors("Sorry, you can't do that!");
        }

        if ($item->draft()) {
            $brand = Brand::findOrFail($request->brand);
            $category = Category::findOrFail($request->category);
            $item->brand()->associate($brand);
        }
        // handle the main image.
        if ($request->image instanceof UploadedFile) {
            $image = Image::from($request->image);
            $item->image()->associate($image);
        }
        // handle the extra images (can be done async)
        $images = collect($request->images)->map(function (UploadedFile $file) {
            $image = Image::from($file);

            return $image->id;
        });

        $item->fill($request->only([
            'english_name',
            'foreign_name',
            'notes',
            'internal_notes',
            'year',
            'product_number',
            'price',
            'currency',
        ]));
        $item->save();
        // now we can add features, attributes and images.
        //$item->images()->attach($images->all());
        $item->features()->sync($request->features);
        $item->colors()->sync($request->colors);
        $item->tags()->sync($request->tags);
        $item->categories()->sync($request->categories);
        $item->attributes()->sync(
            collect($request->input('attributes'))
                ->filter()
                ->map(function ($value, $key) {
                    return ['attribute_id' => $key, 'value' => $value];
                }
                )
        );

        return redirect()->route('items.show', $item);
    }

    /**
     * Publish an item and add it to the search index.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function publish(String $id)
    {
        $item = Item::find($id);
        if ($item->published()) {
            return back()->withErrors('That item is already published.');
        }
        /** @var \App\Models\User $user */
        $user = auth()->user();
        if (! $user->is($item->submitter) && ! $user->senior()) {
            // require senior to publish other's items.
            return back()->withErrors("You cannot publish another user's post with your access level!");
        }

        if (! $user->lolibrarian()) {
            return back()->withErrors("Sorry, you can't publish items with your role");
        }

        $item->publish();

        return back()->with('status', 'Item Published - It may take a few moments for it to appear in search results!');
    }

    /**
     * Delete an item.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        $item = Item::find($id);
        $error = back()->withErrors("You don't have permission to do that.");
        /** @var \App\Models\User $user */
        $user = auth()->user();
        if ($item->published() && ! $user->admin()) {
            return $error;
        } elseif (! ($user->is($item->submitter) || $user->senior())) {
            return $error;
        }
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('status', 'Item deleted successfully');
    }

    /**
     * Delete an image on a post.
     *
     * @param \App\Models\Item $item
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function deleteImage(String $id, String $image_id)
    {
        $item = Item::find($id);
        $image = Image::find($image_id);
        // sanity check first
        if (! $item->images->contains($image)) {
            abort(404);
        }
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($item->published()) {
            $allowed = ($user->is($item->submitter) && $user->lolibrarian()) || $user->senior();
        } else {
            $allowed = $user->is($item->submitter) || $user->senior();
        }

        if (! $allowed) {
            return back()->withErrors("You aren't allowed to do that!");
        }

        if ($image->id === uuid5('default')) {
            return back()->withErrors("You can't delete the default image.");
        }

        $image->delete();

        return back()->with('status', 'Image Deleted');
    }
}