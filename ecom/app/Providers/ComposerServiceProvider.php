<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'admin.master',
            'App\Http\ViewComposers\ViewComposer'
        );
        view()->composer(
            'fontend.home.index',
            'App\Http\ViewComposers\SliderComposer'
        );
        view()->composer(
            'fontend.master',
            'App\Http\ViewComposers\ViewComposer'
        );
        view()->composer(
            'fontend.*',
            'App\Http\ViewComposers\SettingComposer'
        );
        view()->composer(
            'fontend.profile.profile',
            'App\Http\ViewComposers\ViewComposer'
        );
        view()->composer(
            'fontend.category.index',
            'App\Http\ViewComposers\CategoryComposer'
        );
    }
}
