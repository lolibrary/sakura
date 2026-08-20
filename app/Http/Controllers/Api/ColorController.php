<?php

namespace App\Http\Controllers\Api;

use App\Models\Color;
use App\Models\Filters\VisibilityFilter;
use Illuminate\Database\Eloquent\Collection;

class ColorController extends Controller
{
    /**
     * Return all colors, cached.
     *
     * @return Collection<Color>
     *
     * @throws \Exception
     */
    public function index(): Collection
    {
        return Color::cached()->filter(new VisibilityFilter);
    }

    public function show(Color $color): Color
    {
        return $color;
    }
}
