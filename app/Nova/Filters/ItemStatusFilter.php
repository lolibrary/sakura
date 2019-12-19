<?php

namespace App\Nova\Filters;

use App\Models\Item as BaseItem;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class ItemStatusFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        if ($request->user()->developer() && $value === 'shoe-drafts') {
            // this is just so shoes can be added and deleted easily during testing.
            return $query->where('status', 10);
        }

        if (starts_with($value, 'my-')) {
            $query->where('user_id', $request->user()->id);

            $value = str_replace($value, 'my-', '');
        }

        return $query->where('status', $value === 'published' ? BaseItem::PUBLISHED : BaseItem::DRAFT);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $options = [
            'Published' => 'published',
            'Drafts' => 'drafts',
            'My Drafts' => 'my-drafts',
            'My Items' => 'my-published',
        ];

        if ($user->developer()) {
            $options['(Dev) Shoe Drafts'] = 'shoe-drafts';
        }

        return $options;
    }
}