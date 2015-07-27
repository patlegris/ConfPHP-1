<?php

namespace App\Providers;

use App\Helpers\Active;
use Illuminate\Support\ServiceProvider;

class ActiveServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('active', function () {
            return new Active;
        });
    }
}
