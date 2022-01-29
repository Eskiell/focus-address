<?php

namespace Eskiell\FocusAddress;

use Illuminate\Support\ServiceProvider;

class FocusAddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
         $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/Routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('focus-address.php'),
            ], 'config');
            $this->commands([
                Commands\AddressGenerate::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'focus-address');
        $this->app->singleton('focus-address', function () {
            return new FocusAddress;
        });
    }
}
