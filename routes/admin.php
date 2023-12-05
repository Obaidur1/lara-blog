<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin_overview');
    Route::get('/users', [AdminController::class, 'users'])->name('admin_users');
    Route::get('/user/{id}', [AdminController::class, 'user_edit'])->name('user_edit');
    Route::post('/user/{id}/edit', [AdminController::class, 'user_update'])->name('user_update');

    Route::get('/blogs', [AdminController::class, 'blogs'])->name('admin_blogs');
});
