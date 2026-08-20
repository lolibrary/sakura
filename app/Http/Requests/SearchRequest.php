<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchRequest.
 *
 * @property string|null $search
 * @property string|null $category
 * @property string[]|null $categories
 * @property string|null $brand
 * @property string[]|null $brands
 * @property string|null $color
 * @property string[]|null $colors
 * @property string|null $feature
 * @property string[]|null $features
 * @property string|null $tag
 * @property string[]|null $tags
 * @property int|null $year
 * @property int[]|null $years
 */
class SearchRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if (! empty($this->year)) {
            $years = array_map('intval', explode(',', $this->year));
            sort($years);
            $multiple = count($years) > 1;
            $this->merge([
                'start_year' => $years[0],
                'end_year' => ($multiple ? end($years) : (int) date('Y') + 3),
            ]);
        }

        if (empty($this->sort) || ! valid_sort($this->sort)) {
            $this->merge(['sort' => 'added_new']);
        }
    }

    /**
     * Check if this request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get a list of rules for this request.
     */
    public function rules(): array
    {
        return [
            'search' => 'sometimes|required|string|encoding:utf-8|min:0,max:60',

            'category' => 'sometimes|required|string|ascii|exists:category,slug',
            'categories' => 'sometimes|array',
            'categories.*' => 'required|string|ascii|exists:categories,slug',

            'brand' => 'sometimes|required|string|ascii|exists:brands,slug',
            'brands' => 'sometimes|array',
            'brands.*' => 'required|string|ascii|exists:brands,slug',

            'color' => 'sometimes|required|string|ascii|exists:colors,slug',
            'colors' => 'sometimes|array',
            'colors.*' => 'required|string|ascii|exists:colors,slug',

            'feature' => 'sometimes|required|string|ascii|exists:features,slug',
            'features' => 'sometimes|array',
            'features.*' => 'required|string|ascii|exists:features,slug',

            'tag' => 'sometimes|required|string|ascii|exists:tags,slug',
            'tags' => 'sometimes|array',
            'tags.*' => 'required|string|ascii|exists:tags,slug',

            'start_year' => 'sometimes|required|integer|min:1970|max:'.((int) date('Y') + 3),
            'end_year' => 'sometimes|required|integer|min:1970|max:'.((int) date('Y') + 3),
            'sort' => 'sometimes|required|string',
        ];
    }
}
