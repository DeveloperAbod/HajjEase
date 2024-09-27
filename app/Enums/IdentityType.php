<?php

namespace App\Enums;

enum IdentityType: string
{
    case NATIONAL_ID = 'national_id';
    case PASSPORT = 'passport';

    // Method to return a label for each enum value
    public function label(): string
    {
        return match ($this) {
            self::NATIONAL_ID => 'هوية وطنية',
            self::PASSPORT => 'جواز سفر',
        };
    }
}
