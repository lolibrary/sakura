<?php

namespace App\Http\Controllers\Api;

use App\Models\Color;
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
        return Color::cached();
    }

    public function show(Color $color): Color
    {
        return $color;
    }
}
