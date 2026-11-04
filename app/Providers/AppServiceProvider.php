<?php

namespace App\Providers;

use App\Policies\DashboardPolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('view-promotor-dashboard', [DashboardPolicy::class, 'viewPromotor']);
        Gate::define('view-user-dashboard', [DashboardPolicy::class, 'viewUser']);
    }
}
