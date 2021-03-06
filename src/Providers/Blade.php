<?php

namespace Nur\Providers;

use Nur\Kernel\ServiceProvider;

class Blade extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     * @throws
     */
    public function register()
    {
        $this->app->set('blade', \Nur\Blade\Blade::class);
    }
}