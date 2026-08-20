<?php

namespace App\Composers;

use Illuminate\View\View;

class Years
{
    /**
     * Add data to the given view.
     */
    public function compose(View $view): void
    {
        $view->with('years', array_reverse(range(1970, (int) date('Y') + 1)));
    }
}
