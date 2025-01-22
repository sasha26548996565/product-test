<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Models\Product;
use App\Support\Enums\ProductStatuses;
use App\Support\Contracts\Product\StoreProductContract;

class StoreProductAction implements StoreProductContract
{
    public function __invoke(array $params): Product
    {
        $productData = [
            'article' => $params['article'],
            'name' => $params['name'],
            'status' => ProductStatuses::from((int) $params['status']),
            'data' => formatJsonData($params['data'] ?? []),
        ];

        $product = Product::create($productData);

        return $product;
    }
}
