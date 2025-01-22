<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Product\UpdateRequest;
use App\Support\Contracts\Product\UpdateProductContract;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product, UpdateProductContract $action): RedirectResponse
    {
        $params = $request->validated();

        $product = $action($params, $product);

        return to_route('product.show', $product->id);
    }
}
