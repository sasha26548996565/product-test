<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendProductData extends Command
{
    protected $signature = 'send:product-data';
    protected $description = 'send latest product to the webhook every minute';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $product = Product::orderBy('id', 'desc')->first();

        if ($product) {
            $response = Http::post(config('products.webhook'), [
                'id' => $product->id,
                'name' => $product->name,
                'article' => $product->article,
                'status' => $product->status,
                'data' => $product->data,
            ]);

            if ($response->successful()) {
                $this->info('data sent successfully');
                return self::SUCCESS;
            } else {
                $this->error('failed to send data');
                return self::FAILURE;
            }
        } else {
            $this->error('product not found');
            return self::INVALID;
        }
    }
}
