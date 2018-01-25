<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
                '*',
            ],
            'App\Http\ViewComposers\ThemeComposer'
        );

        View::composer([
                '*',
            ],
            'App\Http\ViewComposers\UsersComposer'
        );

        View::composer([
                '*',
            ],
            'App\Http\Controllers\TasksController@getAllTasks'
        );

        View::composer([
                '*',
            ],
            'App\Http\Controllers\TasksController@getCompleteTasks'
        );

        View::composer([
                '*',
            ],
            'App\Http\Controllers\TasksController@getIncompleteTasks'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
