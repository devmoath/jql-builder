<?php

/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace JqlBuilder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static self where(\Closure|string $column, mixed $operator = \JqlBuilder\Operator::EQUALS, mixed $value = null, string $boolean = \JqlBuilder\Keyword::AND)
 * @method static self orWhere(\Closure|string $column, mixed $operator = \JqlBuilder\Operator::EQUALS, mixed $value = null)
 * @method static self when(mixed $value, callable $callback)
 * @method static self whenNot(mixed $value, callable $callback)
 * @method static self orderBy(string $column, string $direction)
 * @method static self rawQuery(string $query)
 * @method static string getQuery()
 * @see \JqlBuilder\Jql
 */
class Jql extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'jql';
    }
}
