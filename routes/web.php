<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\MuwashofatController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DetilJenjangController;
use App\Http\Controllers\Frontend\DetilJenjangFrontendController;

// =====================
// Auth
// =====================
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->middleware('guest')->name('register');
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
    Route::patch('news/{id}/toggle-status', [NewsController::class, 'toggleStatus'])->name('news.toggle-status');

    // Hero
    Route::resource('hero', HeroController::class);
    Route::patch('hero/{id}/toggle', [HeroController::class, 'toggleStatus'])->name('hero.toggle');

    // About
    Route::resource('about', AboutController::class);
    Route::put('about/{about}/toggle-status', [AboutController::class, 'toggleStatus'])->name('about.toggle');

    // Detil Jenjang
    Route::resource('detil-jenjang', DetilJenjangController::class);
    Route::patch('detil-jenjang/{detil}/toggle', [DetilJenjangController::class, 'toggle'])->name('detil-jenjang.toggle');

    // ✅ Footer (backend) tanpa show
    Route::resource('footer', FooterController::class)->except(['show']);
    Route::patch('footer/{id}/set-active', [FooterController::class, 'setActive'])->name('footer.setActive');

    // ✅ Muwashofat (Backend)
    Route::resource('muwashofat', MuwashofatController::class);

    Route::get('/registrations', [RegistrationController::class, 'index'])
        ->name('register.index');
});



// =====================
// Frontend Jenjang
// =====================
Route::get('/jenjang/{level}', [DetilJenjangFrontendController::class, 'showByLevel'])
    ->whereIn('level', ['sd', 'smp', 'sma'])
    ->name('jenjang.show');

// =====================
// Pendaftaran & Detail Jenjang Dinamis
// =====================
Route::post('/register/submit', [RegistrationController::class, 'store'])
    ->name('register.submit');

Route::get('/register/{level}', [RegistrationController::class, 'detail'])
    ->whereIn('level', ['sd', 'smp', 'sma'])
    ->name('register.detail');

Route::resource('stats', App\Http\Controllers\StatController::class);
Route::get('/muwashofat/{id}', [MuwashofatController::class, 'show'])->name('muwashofat.show');
