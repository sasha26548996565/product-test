<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id;

        return [
            'name' => 'required|string|min:10',
            'article' => [
                'required',
                'alpha_num',
                Rule::unique('products', 'article')->ignore($productId),
            ],
            'status' => 'required',
            'data' => 'nullable',
            'data.*' => 'nullable',
        ];
    }
}
