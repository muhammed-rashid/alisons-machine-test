<?php

namespace App\Providers;

use Carbon\Carbon;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_TIME, 'en');
        date_default_timezone_set('Asia/Kolkata');
  
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(getenv('HTTP_SECURE') === 'true') {
            \URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);
        Carbon::setLocale('en');
        
    }
}