<?php

namespace App\Providers;

use App\Mixins\ArrMixin;
use App\Mixins\DBMixin;
use App\Mixins\StrMixin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use ReflectionException;

class MacroableServiceProvider extends ServiceProvider
{
    /**
     * @throws ReflectionException
     */
    public function boot(): void
    {
        DB::mixin(new DBMixin());
        Str::mixin(new StrMixin());
        Arr::mixin(new ArrMixin());
    }
}
