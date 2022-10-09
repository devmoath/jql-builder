<?php

namespace JqlBuilder\Providers;

use JqlBuilder\Jql;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('jql', fn () => new Jql());
    }
}
