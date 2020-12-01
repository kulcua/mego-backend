<?php

namespace App\Providers;

use App\Models\OrderModel;
use App\Models\PermissionModel;
use App\Policies\OrderPolicy;
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
        OrderModel::class => OrderPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //super admin with id = 1 can have all permissions
        Gate::before(function ($user){
            if ($user->id === 1)
                return true;
        });

        if(! $this->app->runningInConsole()) //avoid err when db has not migrate yet
        {
            foreach(PermissionModel::all() as $permission)
            {
                Gate::define($permission->name, function ($user) use ($permission){
                    return $user->hasPermission($permission);
                });
            }
        }
    }
}
