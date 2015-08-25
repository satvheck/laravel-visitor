<?php

namespace Imarcom\Visitor;

use Illuminate\Support\ServiceProvider;

/**
 * 
 */
class VisitorServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $storage = config('visitor.storage');

        if ($storage === 'session') {
            $this->app->bind(
                'Imarcom\Visitor\Storage',
                'Imarcom\Visitor\LaravelSessionStorage'
            );
        } elseif ($storage === 'cookie') {
            $this->app->bind(
                'Imarcom\Visitor\Storage',
                'Imarcom\Visitor\LaravelCookieStorage'
            );
        }

        $this->app->bindShared('visitor', function () {
            return $this->app->make('Imarcom\Visitor\Visitor');
        });
    }

    /**
     * Bootstrap the configuration
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__ . '/../config/visitor.php');

        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([$source => config_path('visitor.php')]);
        }

        $this->mergeConfigFrom($source, 'visitor');
    }

}