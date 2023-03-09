<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\UserPermission;
use Config;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
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
       
        /* define permission for user */
        // $acl_permissions = Config::get('constants.acl_permissions');
       
        // foreach($acl_permissions as $role => $permissions) {
        //     foreach($permissions as $permission) { 
        //         $acl = "{$role}-{$permission}";               
        //         Gate::define($acl, function() use($acl) { 
        //             $guard = \Helper::getAuthGuard();                  
        //             return Auth::guard($guard)->user()->role == 'admin' || UserPermission::where('user_id',Auth::guard($guard)->user()->id)->where('permission',$acl)->count();
        //         });
        //     }
        // }
    }
}