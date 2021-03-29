<?php

namespace AmirNajmi\Category;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

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
        $this->mergeConfigFrom(__DIR__.'/../config/category.php', 'category');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Register the service the package provides.
        $this->app->singleton('category', function ($app) {
            return new Category;
        });
    }
    public function registerPublishable()
    {
        $basePath = dirname(__DIR__);
        $arrPublishable = [
            'migrations' => [
                "$basePath/publishable/database/migrations" => database_path('migrations'),
            ],
            'config' => [
                "$basePath/publishable/config/Category.php" => config_path('Category.php'),
            ]
        ];

        foreach ($arrPublishable as $group => $paths){
            $this->publishable($paths,$group);
        }
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['category'];
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
            __DIR__.'/../config/category.php' => config_path('category.php'),
        ], 'category.config');
        $this->publishes([
            __DIR__.'/../database/' => config_path('category.php'),
        ], 'category.config');
        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/amirnajmi'),
        ], 'category.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/amirnajmi'),
        ], 'category.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/amirnajmi'),
        ], 'category.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
