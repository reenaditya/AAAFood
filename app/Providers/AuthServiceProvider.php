<?php

namespace App\Providers;

use App\Models\Cuisine;
use App\Policies\CuisinePolicy;
use App\Models\Restaurant;
use App\Policies\RestaurantPolicy;
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
        'App\Models\Cuisine' => 'App\Policies\CuisinePolicy',
        'App\Models\Restaurant' => 'App\Policies\RestaurantPolicy',
        /*Cuisine::class => CuisinePolicy::class,*/
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
