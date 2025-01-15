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

        Gate::define('manage-research-grants', function (User $user) {
            return in_array($user->role, ['admin', 'staff']);
        });

        Gate::define('manage-project-members', function (User $user) {
            return in_array($user->role, ['admin', 'staff', 'project_leader']);
        });

        Gate::define('manage-project-milestones', function (User $user) {
            return $user->role === 'project_leader';
        });

        Gate::define('manage-academicians', function (User $user) {
            return $user->role === 'admin';
        });

        
    }
}
