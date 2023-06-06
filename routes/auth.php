<?php

use App\Http\Controllers\Authentication\LoginController;

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logout/g', [LoginController::class, 'logout'])->name('logout.g')->middleware('auth');
