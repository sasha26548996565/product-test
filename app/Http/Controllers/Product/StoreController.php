<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Product\StoreRequest;
use App\Jobs\SendProductCreatedNotificationJob;
use App\Support\Contracts\Product\StoreProductContract;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, StoreProductContract $action): RedirectResponse
    {
        $params = $request->validated();

        $product = $action($params);
        SendProductCreatedNotificationJob::dispatch($product);

        return to_route('product.show', $product->id);
    }
}
