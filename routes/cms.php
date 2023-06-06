<?php

use App\Http\Controllers\CMS\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('cms.index');
Route::get('/dashboard', DashboardController::class)->name('dashboard.index');
