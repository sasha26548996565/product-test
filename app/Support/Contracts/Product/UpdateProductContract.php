<?php

declare(strict_types=1);

namespace App\Support\Contracts\Product;

use App\Models\Product;

interface UpdateProductContract
{
    public function __invoke(array $params, Product $product): Product;
}
