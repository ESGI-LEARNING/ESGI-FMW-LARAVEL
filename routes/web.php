<?php

use App\Enum\RolesEnum;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/images/{path}', [ImageController::class, 'show'])->where('path', '.*')->name('images.show');

Route::controller(BlogController::class)->prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{article:slug}', 'show')->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin')->middleware('role:'.RolesEnum::SUPER_ADMIN)->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/categories', [AdminController::class, 'categories'])->name('categories');

        Route::controller(AdminArticleController::class)->prefix('/articles')->name('articles.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
            Route::get('/{slug}/edit', 'edit')->name('edit');
            Route::post('/{slug}/edit', 'update')->name('update');
        });
    });
});

Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'));
});

require __DIR__.'/auth.php';
