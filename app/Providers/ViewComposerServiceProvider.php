<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
          $view->with('dashboard_composer', \App\Models\Dashboard::first());
        });

        view()->composer('*', function($view){
          $view->with('navigation_composer', \App\Models\Navigation::where('published', 1)->orderBy('order', 'asc')->get());
        });

        view()->composer('*', function($view){
          $view->with('parentNavigation_composer', \App\Models\Navigation::where('published', 1)->where('parent', 0)->orderBy('updated_at', 'desc')->take(10)->get()->sortBy('order'));
        });

        view()->composer('*', function($view){
          $view->with('footerdata_composer', \App\Models\Navigation::where('published', 1)->where('location', 'footer')->orderBy('order', 'asc')->get());
        });





    }
}
