<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Policies\UserPolicy;
use App\Models\User;
use App\Http\Controllers\DashboardController;

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
        // Define the 'manage-users' gate using UserPolicy
        Gate::define('manage-users', [UserPolicy::class, 'manageUsers']);
        
        // Pass dashboard metrics to all views
        View::composer('*', function ($view) {
            $dashboardController = new DashboardController();
            $navbarMetrics = $dashboardController->getNavbarMetrics();

            // Pass the metrics data to all views
            $view->with('navbarMetrics', $navbarMetrics);
        });
    }
}
