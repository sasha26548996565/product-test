<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(Product $product): RedirectResponse
    {
        $product->delete();

        return to_route('product.index');
    }
}
