<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Optional: Super admin bypass
        Gate::before(function (User $user, $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });

        // Register the policy
        Gate::policy(Product::class, ProductPolicy::class);

        // Rate limiter configuration
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60);
        });
    }
}