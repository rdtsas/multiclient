<?php

namespace Rdtsas\Multiclient;

use Illuminate\Support\ServiceProvider;
use Rdtsas\Multiclient\Multiclient;

class MulticlientServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        Multiclient::client();
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bindIf(Multiclient::class, function () {
            return new Multiclient();
        });
    }
}
