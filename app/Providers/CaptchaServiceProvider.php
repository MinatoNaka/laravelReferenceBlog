<?php

namespace App\Providers;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\CaptchaBuilderInterface;
use Illuminate\Support\ServiceProvider;

class CaptchaServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CaptchaBuilderInterface::class,
            function () {
                return new CaptchaBuilder();
            }
        );
    }

    public function provides()
    {
        return [
            CaptchaBuilderInterface::class,
        ];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
