<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('product')->name('product.')->namespace('App\Http\Controllers\Product')->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/show/{product}', ShowController::class)->name('show');
        Route::get('/form/{product?}', FormController::class)->name('form');

        Route::post('/store', StoreController::class)->name('store');
        Route::put('/update/{product}', UpdateController::class)->name('update');

        Route::delete('/destroy/{product}', DestroyController::class)->name('destroy');
    });
});

require __DIR__.'/auth.php';
