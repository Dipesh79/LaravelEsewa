<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EsewaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/esewa.php' => config_path('esewa.php'),
        ], 'config');
    }
}
