<?php

namespace App\Mixins;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ArrMixin
{
    public function commaSeparatedStringToArray(): Closure
    {
        return static function (string $string) {
            if (Str::contains($string, ',')) {
                return Arr::map(explode(',', $string), static fn($item) => trim($item));
            }
            return [$string];
        };
    }
}
