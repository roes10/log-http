<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use ShoestenTag\LogHttp\LogHttpServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LogHttpServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Configure logging for testing
        $app['config']->set('logging.default', 'single');
        $app['config']->set('logging.channels.single', [
            'driver' => 'single',
            'path' => $app->storagePath('logs/laravel.log'),
            'level' => 'debug',
        ]);
    }
}

