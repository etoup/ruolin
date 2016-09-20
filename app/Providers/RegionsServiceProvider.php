<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RegionsServiceProvider extends ServiceProvider
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
            \App\Repositories\Region\RegionsRepositoryContract::class,
            \App\Repositories\Region\EloquentRegionsRepository::class
        );
    }
}
