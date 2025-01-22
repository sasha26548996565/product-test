<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\Product\StoreProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Support\Contracts\Product\StoreProductContract;
use App\Support\Contracts\Product\UpdateProductContract;

class ActionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StoreProductContract::class, StoreProductAction::class);
        $this->app->bind(UpdateProductContract::class, UpdateProductAction::class);
    }
}
