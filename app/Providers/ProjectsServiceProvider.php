<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectsServiceProvider extends ServiceProvider
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
            \App\Repositories\Project\ProjectsRepositoryContract::class,
            \App\Repositories\Project\EloquentProjectsRepository::class
        );
    }
}
