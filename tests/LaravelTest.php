<?php

namespace JqlBuilder\Tests;

use JqlBuilder\Facades\Jql;
use JqlBuilder\Providers\ServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'BotMan' => Jql::class,
        ];
    }

    public function test_it_can_get_the_builder_via_facade(): void
    {
        $this->assertEmpty(Jql::getQuery());
        $this->assertSame(Jql::where('a', '=', 'b')->getQuery(), 'a = "b"');
        $this->assertSame(Jql::where('c', '=', 'd')->getQuery(), 'c = "d"');
    }
}
