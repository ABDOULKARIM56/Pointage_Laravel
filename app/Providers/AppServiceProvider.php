<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        //
        // Pour utiliser le style Bootstrap 5
        Paginator::useBootstrapFive();

        // ou pour Bootstrap 4 :
        // Paginator::useBootstrapFour();

        // Pour Tailwind (par défaut depuis Laravel 8)
        // Paginator::useTailwind();
    }
}
