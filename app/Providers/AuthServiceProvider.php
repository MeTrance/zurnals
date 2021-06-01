<?php

namespace App\Providers;

use App\Models\Report;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Report' => 'App\Policies\ReportPolicy',
        'App\Models\Repairs' => 'App\Policies\RepairPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Admin Permissions

        Gate::define('edit-users', function ($user){
            return $user->hasRole('admin');
        });

        // Specific user update ???
        Gate::define('update-users', function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-users', function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('view-users', function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('view-admin', function ($user){
            return $user->hasRole('admin');
        });

        //Worker Permissions

        Gate::define('create-repair', function ($user){
            return $user->hasRole('worker');
        });

        // Specific user update!!?
        Gate::define('update-repair', function ($user){
            return $user->hasRole('worker');
        });

        Gate::define('edit-repair', function ($user){
            return $user->hasRole('worker');
        });

        Gate::define('delete-repair', function ($user){
            return $user->hasRole('worker');
        });

        Gate::define('view-repair', function ($user){
            return $user->hasRole('worker');
        });

        //Reporter Permissions

        Gate::define('create-report', function ($user){
            return $user->hasRole('reporter');
        });

        Gate::define('edit-report', function ($user){
            return $user->hasRole('reporter');
        });

        Gate::define('update-report', function ($user){
            return $user->hasRole('reporter');
        });

        Gate::define('delete-report', function ($user){
            return $user->hasRole('reporter');
        });

        Gate::define('view-report', function ($user){
            return $user->hasRole('reporter');
        });

        //Viewer Permissions

        Gate::define('view-report', function ($user){
            return $user->hasRole('viewer');
        });

        Gate::define('view-repair', function ($user){
            return $user->hasRole('viewer');
        });



    }
}
