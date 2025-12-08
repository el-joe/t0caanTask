<?php

namespace App\Enums;

enum OrderStatusEnum : string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case CANCELLED = 'cancelled';

    static function valuesAsString(): string
    {
        return implode(',', array_map(fn($case) => $case->value, self::cases()));
    }
}
