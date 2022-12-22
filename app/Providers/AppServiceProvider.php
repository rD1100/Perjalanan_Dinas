<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   // pagination bootstrap
        Paginator::useBootstrap();
        // gate authentication ui /kontent
        Gate::define('sdm',function(User $user){
            // dump( $user->name);
            return $user->role_id ;
        });
    }
}
