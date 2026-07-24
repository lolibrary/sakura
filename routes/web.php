<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Api\IdentityController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Items\BrandController;
use App\Http\Controllers\Items\CategoryController;
use App\Http\Controllers\Items\ColorController;
use App\Http\Controllers\Items\FeatureController;
use App\Http\Controllers\Items\ItemController;
use App\Http\Controllers\Items\TagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\SearchController;

Auth::routes(['verify' => true]);

// Homepage
Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/lang', [HomeController::class, 'set_lang'])->name('set_lang');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/search', [SearchController::class, 'post'])->name('search_post');

// User
Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/', [ProfileController::class, 'update'])->name('update');
    Route::get('closet', [ProfileController::class, 'closet'])->name('closet');
    Route::get('{username}/closet', [PublicProfileController::class, 'closet'])->name('public_closet');
    Route::get('wishlist', [ProfileController::class, 'wishlist'])->name('wishlist');
    Route::get('{username}/wishlist', [PublicProfileController::class, 'wishlist'])->name('public_wishlist');
});

// auth endpoint (for mediawiki)
Route::get('api/auth', [IdentityController::class, 'show']);

// blog posts route.
Route::get('blog/{post}', [BlogController::class, 'show'])->name('posts.show');

// categories/brands/features etc
Route::group([], function () {
    $options = ['only' => ['show', 'index']];

    Route::resource('brands', BrandController::class, $options);
    Route::resource('categories', CategoryController::class, $options);
    Route::resource('features', FeatureController::class, $options);
    Route::resource('colors', ColorController::class, $options);
    Route::resource('tags', TagController::class, $options);

    Route::get('items', [ItemController::class, 'index'])->name('items.index');
    Route::get('items/{item}', [ItemController::class, 'show'])->name('items.show');
});

Route::get('donate', [DonationController::class, 'index'])->name('donate');
Route::get('donate/thanks', [DonationController::class, 'thanks'])->name('donate.thanks');
Route::get('donate/paypal', [DonationController::class, 'paypal'])->name('donate.paypal');
Route::get('donate/patreon', [DonationController::class, 'patreon'])->name('donate.patreon');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::put('items/{item}/closet', [ItemController::class, 'closet'])->name('items.closet');
    Route::put('items/{item}/wishlist', [ItemController::class, 'wishlist'])->name('items.wishlist');
});
