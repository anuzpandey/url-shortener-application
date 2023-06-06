<?php

namespace App\Mixins;

use Closure;
use Illuminate\Support\Str;

class StrMixin
{
    /**
     * Convert a string to title case
     *
     * @return Closure
     */
    public function snakeToTitleCase(): Closure
    {
        return static function (string $string) {
            return Str::title(str_replace('_', ' ', $string));
        };
    }

    public function initials(): Closure
    {
        return static function (string $string) {
            $words = explode(' ', $string);
            if (count($words) >= 2) {
                return mb_strtoupper(
                    mb_substr($words[0], 0, 1, 'UTF-8') .
                    mb_substr(end($words), 0, 1, 'UTF-8'),
                    'UTF-8');
            }

            preg_match_all('#([A-Z]+)#', $string, $capitals);
            if (count($capitals[1]) >= 2) {
                return mb_substr(implode('', $capitals[1]), 0, 2, 'UTF-8');
            }

            return mb_strtoupper(mb_substr($string, 0, 2, 'UTF-8'), 'UTF-8');
        };
    }
}
