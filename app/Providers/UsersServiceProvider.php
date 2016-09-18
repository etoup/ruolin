<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\IUsers\UsersRepositoryContract::class,
            \App\Repositories\IUsers\EloquentUsersRepository::class
        );
    }
}
