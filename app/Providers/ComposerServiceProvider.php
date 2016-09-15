<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'dashboard',
            'App\Http\Controllers\TasksController@getAllTasks'
        );
        view()->composer(
            'dashboard',
            'App\Http\Controllers\TasksController@getCompleteTasks'
        );
        view()->composer(
            'dashboard',
            'App\Http\Controllers\UsersManagementController@getTotalUsers'
        );
        view()->composer(
            '*',
            'App\Http\Controllers\TasksController@getIncompleteTasks'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
