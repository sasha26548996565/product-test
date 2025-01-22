<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProductCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Product $product
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('new product created')
            ->line('name: ' . $this->product->name)
            ->line('article: ' . $this->product->article)
            ->action('view: ', url('/products/' . $this->product->id));
    }

    public function toArray($notifiable): array
    {
        return [
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
        ];
    }
}
