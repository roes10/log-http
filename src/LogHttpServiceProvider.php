<?php

namespace ShoestenTag\LogHttp;

use Illuminate\Support\ServiceProvider;

class LogHttpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app['router']->aliasMiddleware('log-http', InterceptMiddleware::class);
    }
}
