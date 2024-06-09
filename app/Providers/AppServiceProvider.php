<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();//動画
        // Paginator::useBootstrapFive();    公式ドキュメント
       //または Paginator::useBootstrapFour();    公式ドキュメント
       \URL::forceScheme('https'); 
       $this->app['request']->server->set('HTTPS','on');
    }
    
}
