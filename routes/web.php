<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RegistrationController;

// =====================
// Auth
// =====================
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =====================
// Halaman depan
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home');

// News untuk user (frontend)
Route::get('/news', [NewsController::class, 'all'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// =====================
// Admin area (hanya bisa diakses setelah login)
// =====================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // News (backend)
    Route::get('news', [NewsController::class, 'adminIndex'])->name('news.index');
    Route::resource('news', NewsController::class)->except(['index']);
    Route::patch('news/{id}/toggle-status', [NewsController::class, 'toggleStatus'])
        ->name('news.toggle-status');

    // Hero
    Route::resource('hero', HeroController::class);
    Route::patch('hero/{id}/toggle', [HeroController::class, 'toggleStatus'])->name('hero.toggle');

    // About
    Route::resource('about', \App\Http\Controllers\Admin\AboutController::class);
    Route::put('/admin/about/{about}/toggle-status', [AboutController::class, 'toggleStatus'])->name('admin.about.toggle');
});


// Halaman detail per jenjang
Route::view('/jenjang/sd', 'jenjang.sd')->name('jenjang.sd');
Route::view('/jenjang/smp', 'jenjang.smp')->name('jenjang.smp');
Route::view('/jenjang/sma', 'jenjang.sma')->name('jenjang.sma');

// Proses submit form pendaftaran
Route::post('/register/submit', [RegistrationController::class, 'store'])->name('register.submit');

// Optional: detail dinamis berdasarkan level
Route::get('/register/{level}', [RegistrationController::class, 'detail'])->name('register.detail');
