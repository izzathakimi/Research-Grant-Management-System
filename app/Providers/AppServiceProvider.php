<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
            Schema::defaultStringLength(191);

        Gate::define('list-feedback', function (User $user) {
            return in_array($user->role, ['admin', 'staff']); // Only admin and staff can access
            // OR
            return $user->role === 'admin'; // Only admin can access
        });
    }
}
