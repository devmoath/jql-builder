<?php

use JqlBuilder\Facades\Jql;
use Orchestra\Testbench\TestCase;

uses(TestCase::class);

it('can get the builder via facade', function () {
    expect(Jql::getQuery())->toBeEmpty()
        ->and(Jql::where('a', '=', 'b')->getQuery())->toBe('a = "b"')
        ->and(Jql::where('c', 'd')->getQuery())->toBe('c = "d"');
});
