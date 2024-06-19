<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Item;

/**
 * A request to create a new item.
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
 * @property \Illuminate\Http\UploadedFile $image
 * @property \Illuminate\Http\UploadedFile[] $images
 */
class ItemStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'english_name' => 'required|string',
            'foreign_name' => 'required|string',
            'year' => 'nullable|integer|min:1990|max:' . (date('Y') + 3),
            'price' => 'nullable|numeric',
            'currency' => 'nullable|string|in:' . implode(',', array_keys(Item::CURRENCIES)),
            'notes' => 'nullable|string',
            'product_number' => 'nullable|string',

            // relationships

            'brand' => 'required|string|exists:brands,id',
            'categories.*' => 'required|string|exists:categories,id',

            'tags.*' => 'string|exists:tags,id',
            'attributes' => 'array',
            'features.*' => 'string|exists:features,id',
            'colors.*' => 'string|exists:colors,id',

            'image' => 'required|image',
            'images.*' => 'image',
        ];
    }
}
