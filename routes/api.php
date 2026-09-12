<?php

use App\Http\Controllers\Api\SearchController;

Route::post('search', [SearchController::class, 'index'])->name('api.search');
