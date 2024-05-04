<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Blog\Insights\BlogPostInsight;
use App\Livewire\Users\UserManager;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(AdminMiddleware::class)->group(function() {
        Route::get('/users', UserManager::class)->name('users.manage');
        Route::resource('/blog', BlogController::class);
        Route::get('/blog/insights/{slug}', BlogPostInsight::class)->name('blog.insights');
    });
});

Route::get('/blog/post/{post}', [BlogController::class, 'show'])->name('blog.post.show');

require __DIR__.'/auth.php';
