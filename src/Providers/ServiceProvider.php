<?php

namespace JqlBuilder\Providers;

use JqlBuilder\Jql;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('jql', fn () => new Jql());
    }
}
