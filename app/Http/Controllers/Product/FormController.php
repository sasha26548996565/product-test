<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function __invoke(?Product $product): View
    {
        $data = isset($product?->id) ? json_decode($product->data, true) : [];

        return view('product.form', compact('product', 'data'));
    }
}
