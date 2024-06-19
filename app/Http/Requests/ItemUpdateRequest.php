<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Item;

/**
 * An item update request.
 *
 * @property string $english_name
 * @property string $foreign_name
 * @property int $year
 * @property float $price
 * @property string $currency
 * @property string|null $notes
 * @property string|null $product_number
 * @property string $brand
 * @property string $category
 * @property array $tags
 * @property array $attributes
 * @property array $features
 * @property array $colors
 * @property \Illuminate\Http\UploadedFile|null $image
 * @property \Illuminate\Http\UploadedFile[] $images
 */
class ItemUpdateRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (!empty($this->categories) && !is_array($this->categories)) {
            $this->merge([
                'categories' => [$this->categories]
            ]);
        }
    }

    public function rules()
    {
        return [
            'english_name' => 'required|string',
            'foreign_name' => 'required|string',
            'year' => 'nullable|integer|min:1970|max:' . (date('Y') + 3),
            'price' => 'nullable|numeric',
            'currency' => 'nullable|string|in:' . implode(',', array_keys(Item::CURRENCIES)),
            'notes' => 'nullable|string',
            'product_number' => 'nullable|string',

            // relationships

            'brand' => 'required|string|exists:brands,id',
            'categories' => 'required|array',
            'categories.*' => 'string|exists:categories,id',

            'tags' => 'required|array',
            'tags.*' => 'string|exists:tags,id',

            'attributes' => 'nullable|array',

            'features' => 'nullable|array',
            'features.*' => 'string|exists:features,id',

            'colors' => 'nullable|array',
            'colors.*' => 'string|exists:colors,id',

            'image' => 'nullable|image',
            'images.*' => 'image',
        ];
    }
}
