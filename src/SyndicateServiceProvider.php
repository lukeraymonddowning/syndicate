<?php

namespace LukeDowning\Syndicate;

use Illuminate\Support\ServiceProvider;

class SyndicateServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'lukedowning');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'lukedowning');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/syndicate.php', 'syndicate');

        // Register the service the package provides.
        $this->app->singleton('syndicate', function ($app) {
            return new Syndicate;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['syndicate'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/syndicate.php' => config_path('syndicate.php'),
        ], 'syndicate.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/lukedowning'),
        ], 'syndicate.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/lukedowning'),
        ], 'syndicate.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/lukedowning'),
        ], 'syndicate.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
