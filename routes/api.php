<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Product\IndexController;

Route::get('/products', IndexController::class);
