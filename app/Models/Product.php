<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\Enums\ProductStatuses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'article',
        'name',
        'status',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
        'status' => ProductStatuses::class,
    ];

    public function scopeAvailable($query): Builder
    {
        return $query->where('status', ProductStatuses::Available);
    }

    public function routeNotificationForMail(Notification $notification): string
    {
        return config('products.email');
    }
}
