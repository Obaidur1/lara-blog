<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Homepage
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/category/{category}', [BlogController::class, 'index'])->name('home_categorized');

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Profile
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Blog CRUD
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/blog', [BlogController::class, 'create'])->name(('blog.create'));
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
});
Route::post('/comment', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comment');

// Email Verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

require __DIR__ . '/auth.php';

Route::get('/{slug}', [BlogController::class, 'show'])->name('show_blog');
