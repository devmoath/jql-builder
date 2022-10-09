<?php

/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace JqlBuilder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \JqlBuilder\Jql where(\Closure|string $column, mixed $operator = \JqlBuilder\Operator::EQUALS, mixed $value = null, string $boolean = \JqlBuilder\Keyword::AND)
 * @method static \JqlBuilder\Jql orWhere(\Closure|string $column, mixed $operator = \JqlBuilder\Operator::EQUALS, mixed $value = null)
 * @method static \JqlBuilder\Jql when(mixed $value, callable $callback)
 * @method static \JqlBuilder\Jql whenNot(mixed $value, callable $callback)
 * @method static \JqlBuilder\Jql orderBy(string $column, string $direction)
 * @method static \JqlBuilder\Jql rawQuery(string $query)
 * @method static string getQuery()
 * @see \JqlBuilder\Jql
 */
class Jql extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        self::clearResolvedInstance(\JqlBuilder\Jql::class);

        return \JqlBuilder\Jql::class;
    }
}
