<?php

namespace App\Providers;

use App\Post;
use App\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', function ($view) {
            $view->with('settings', Settings::find(1));
        });

        View::composer('front-end.partials.footer', function($view) {
            $view->with('posts', Post::query()->active()->get());
        });
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
