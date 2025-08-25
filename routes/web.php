<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;

// Halaman depan
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'all'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Admin area
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD News
    Route::resource('news', NewsController::class);
    Route::patch('news/{id}/toggle-status', [NewsController::class, 'toggleStatus'])
        ->name('news.toggle-status');

    // CRUD Hero
    Route::resource('hero', HeroController::class);
    Route::patch('hero/{id}/toggle', [HeroController::class, 'toggleStatus'])->name('hero.toggle');
});
