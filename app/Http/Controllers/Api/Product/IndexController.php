<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $products = Product::available()->get();

        return response()->json(compact('products'));
    }
}
