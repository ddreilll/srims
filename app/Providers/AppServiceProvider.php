<?php

namespace App\Providers;

use App\Core\Bootstrap;
use App\Services\GDriveService;
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
        Bootstrap::init();
        GDriveService::init();
    }
}
