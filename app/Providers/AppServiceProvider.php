<?php

namespace App\Providers;

use App\Models\Role;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
        // Define the rate limiter for the "api" middleware
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60); // Atur kecepatan sesuai kebutuhan Anda
        });

        Gate::policy(Role::class, RolePolicy::class);
    }
}