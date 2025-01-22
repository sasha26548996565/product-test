<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:10',
            'article' => 'required|alpha_num|unique:products,article',
            'status' => 'required',
            'data' => 'nullable',
            'data.*' => 'nullable',
        ];
    }
}
