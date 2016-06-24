<?php

namespace Emiolo\User\Providers;

use Illuminate\Support\ServiceProvider;
use Emiolo\User\Routing\Router as ERouter; // Emiolo Router

class UserServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../resources/migrations'=>  base_path('database/migrations')
            ],'migrations');
        $this->publishes([
            __DIR__.'/../../resources/factories'=>  base_path('database/factories')
            ],'migrations');
        $this->publishes([
            __DIR__ . '/../../config/auth.php' => base_path('config/auth.php')
                ], 'config');
        $this->publishes([
            __DIR__ . '/../../resources/views' => base_path('resources/views')
                ], 'auth');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/user', 'user');
        require __DIR__ . '/../../routes.php';
    }

    public function register()
    {
        $this->app->bind(\Emiolo\User\Repositories\UserRepositoryInterface::class, \Emiolo\User\Repositories\UserRepositoryEloquent::class);
        $this->app->singleton("emiolo_user_route", function() {
            return new ERouter();
        });
    }

}
