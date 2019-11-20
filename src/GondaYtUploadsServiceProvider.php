<?php

namespace Rajagonda\GondaYtUploads;

use Illuminate\Support\ServiceProvider;

class GondaYtUploadsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $config = realpath(__DIR__.'/../config/GondaYtUploads.php');

        $this->publishes([$config => config_path('GondaYtUploads.php')], 'config');

        $this->mergeConfigFrom($config, 'GondaYtUploads');

        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations')
        ], 'migrations');

        if($this->app->config->get('GondaYtUploads.routes.enabled')) {
            include __DIR__.'/../routes/web.php';
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('GondaYtUploads', function($app) {
            return new GondaYtUploads($app, new \Google_Client);
        });
    }
}