<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Navbar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('footer', \App\Models\Footer::active()->first());
        });

        // Semua view yang pakai partial navbar otomatis dapat $navbar
        View::composer('partials.navbar', function ($view) {
            $navbar = Navbar::first(); // ambil navbar pertama dari DB
            $view->with('navbar', $navbar);
        });
    }
}
