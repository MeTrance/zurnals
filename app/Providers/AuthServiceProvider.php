<?php

namespace App\Providers;

use App\Models\Report;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /*
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

        Gate::define('admin', function ($user){
           return $user->hasRole('admin');
        });

        Gate::define('report', function ($user){
            return $user->hasAnyRoles(['admin', 'reporter']);
        });

        Gate::define('repair', function ($user){
            return $user->hasAnyRoles(['admin', 'worker']);
        });

        Gate::define('view', function ($user){
            return $user->hasAnyRoles(['admin']);
        });

    }
}
