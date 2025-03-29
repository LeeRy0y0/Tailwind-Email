<?php

namespace TailwindEmail;

use Illuminate\Support\ServiceProvider;

class TailwindEmailServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(TailwindCssInliner::class, function ($app) {
            return new TailwindCssInliner();
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tailwind-email');
    }
}
