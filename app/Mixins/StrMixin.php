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

    public function extractDomainName(): Closure
    {
        return static function (string $url) {
            // Remove the protocol (http:// or https://)
            $url = preg_replace('/^https?:\/\//', '', $url);

            // Remove "www." if present
            $url = preg_replace('/^www\./', '', $url);

            // Extract the domain title
            preg_match('/^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n]+)/', $url, $matches);
            $title = $matches[1];

            // Remove the TLD and any remaining path segments
            $title = preg_replace('/\.[^.]+$/', '', $title);

            return $title;
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

    public function ensureSecureUrl(): Closure
    {
        return static function (string $url) {
            if (preg_match('/^(http|https):\/\//', $url)) {
                // URL already has http:// or https:// prefix, so return it as is
                return $url;
            } else {
                // URL doesn't have http:// or https:// prefix, so add https:// and return the secure URL
                return 'https://' . $url;
            }
        };
    }


}
