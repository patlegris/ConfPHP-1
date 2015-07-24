<?php

namespace App\Providers;

use App\Helpers\Captcha;
use Illuminate\Support\ServiceProvider;

class CaptchaServiceProvider extends ServiceProvider {

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
        $this->app->singleton('captcha', function () {
            return new Captcha;
        });
    }
}
