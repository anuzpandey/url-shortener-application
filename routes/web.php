<?php

use App\Http\Controllers\Landing\LinkController;
use App\Http\Controllers\Landing\LinkRedirectController;
use App\Http\Controllers\Landing\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', SiteController::class)->name('index');

Route::post('/link', [LinkController::class, 'store'])->name('link.store');
Route::get('/link/{link:shortened_url}', [LinkController::class, 'show'])->name('link.show');

Route::get('{link:shortened_url}', LinkRedirectController::class)
    ->name('link.redirect')
    ->where('link', '[a-zA-Z0-9]{6}');
