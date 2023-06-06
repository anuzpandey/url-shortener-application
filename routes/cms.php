<?php

use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\LinkController;
use App\Http\Controllers\CMS\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('cms.index');
Route::get('/dashboard', DashboardController::class)->name('dashboard.index');

Route::resource('users', UserController::class)->except('show');

Route::resource('links', LinkController::class);
