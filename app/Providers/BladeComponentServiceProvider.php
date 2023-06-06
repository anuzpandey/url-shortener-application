<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }


    public function boot(): void
    {
        Blade::anonymousComponentPath(base_path('resources/views/landing/_components'), 'landing');
        Blade::anonymousComponentPath(base_path('resources/views/cms/_components'), 'cms');
    }
}
