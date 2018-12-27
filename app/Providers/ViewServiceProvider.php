<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TasksRepository;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
        view()->composer('layouts.app','App\Http\ViewComposer\TaskCountComposer@compose');
        // view()->composer('layouts.app',function($view){
        //     $view->with([
        //         'total'=>10,
        //         'todoCount'=>5,
        //         'doneCount'=>5
        //     ]);
        // });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
