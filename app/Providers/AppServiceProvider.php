<?php

namespace App\Providers;

use App\Models\Link;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::bind('link', function ($value) {
            return Link::withTrashed()->where('shortened_url', $value)->firstOrFail();
        });
    }
}
