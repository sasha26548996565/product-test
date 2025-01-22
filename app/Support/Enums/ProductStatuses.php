<?php

declare(strict_types=1);

namespace App\Support\Enums;

enum ProductStatuses: int
{
    case Available = 1;
    case Unavailable = 2;

    public function label(): string
    {
        return match ($this) {
            self::Available => 'available',
            self::Unavailable => 'unavailable',
        };
    }
}
