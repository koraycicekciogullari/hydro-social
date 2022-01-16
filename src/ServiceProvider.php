<?php

namespace Koraycicekciogullari\HydroSocial;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/hydro-social.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('hydro-social.php'),
        ], 'config');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/Routes/social-media-route.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'hydro-social'
        );
    }
}
