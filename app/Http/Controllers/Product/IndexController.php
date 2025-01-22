<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }
}
