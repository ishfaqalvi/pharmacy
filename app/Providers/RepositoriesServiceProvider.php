<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\AdminInterface',       'App\Repositories\AdminRepository');
        $this->app->bind('App\Contracts\CartInterface',       'App\Repositories\CartRepository');
        $this->app->bind('App\Contracts\CustomerInterface',       'App\Repositories\CustomerRepository');
        $this->app->bind('App\Contracts\ProductInterface',       'App\Repositories\ProductRepository');
        $this->app->bind('App\Contracts\OrderInterface',       'App\Repositories\OrderRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
