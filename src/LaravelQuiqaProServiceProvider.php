<?php

namespace Shengamo\LaravelQuiqaPro;

use Illuminate\Support\ServiceProvider;

class LaravelQuiqaProServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'shengamo');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'shengamo');
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
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-quiqa-pro.php', 'laravel-quiqa-pro');

        // Register the service the package provides.
        $this->app->singleton('laravel-quiqa-pro', function ($app) {
            return new LaravelQuiqaPro;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-quiqa-pro'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-quiqa-pro.php' => config_path('laravel-quiqa-pro.php'),
        ], 'laravel-quiqa-pro.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/shengamo'),
        ], 'laravel-quiqa-pro.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/shengamo'),
        ], 'laravel-quiqa-pro.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/shengamo'),
        ], 'laravel-quiqa-pro.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
