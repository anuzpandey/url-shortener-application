<?php

namespace App\Traits;

use RuntimeException;

if (PHP_VERSION_ID <= 80100) {
    throw new RuntimeException('PHP version must be 8.1 or higher');
}

trait UseFulEnums
{
    public static function array(): array
    {
        return array_combine(self::names(), self::values());
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
