<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Product $product): View
    {
        return view('product.show', compact('product'));
    }
}
