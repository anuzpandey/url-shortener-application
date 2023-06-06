<?php

namespace App\Mixins;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DBMixin
{
    public function getAutoIncrementId(): Closure
    {
        return static function (string $table): int {
            return DB::select("SHOW TABLE STATUS LIKE '$table'")[0]->Auto_increment;
        };
    }
}
