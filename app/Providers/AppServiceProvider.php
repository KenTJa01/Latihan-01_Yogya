<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // URL::forceRootUrl(Config::get('http://yogya_learning.com'));
        // // And this if you wanna handle https URL scheme
        // // It's not usefull for http://www.example.com, it's just to make it more independant from the constant value
        // if (Str::contains(Config::get('http://yogya_learning.com'), 'http://yogya_learning.com')) {
        //     URL::forceScheme('http');
        //     //use \URL:forceSchema('https') if you use laravel < 5.4
        // }
    }
}
