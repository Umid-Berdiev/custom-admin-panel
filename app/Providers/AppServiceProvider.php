<?php

namespace App\Providers;

use TCG\Voyager\Facades\Voyager;
use App\FormFields\GrapesFormField;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(GrapesFormField::class);
        Voyager::useModel('Post', \App\Post::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
