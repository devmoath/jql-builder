<?php

if (! function_exists('tap')) {
    function tap(mixed $value, callable $callback): mixed
    {
        $callback($value);

        return $value;
    }
}

if (! function_exists('array_wrap')) {
    function array_wrap(mixed $value): array
    {
        if (is_null($value)) {
            return [];
        }

        return is_array($value) ? $value : [$value];
    }
}

if (! function_exists('value')) {
    function value(mixed $value, mixed ...$args): mixed
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }
}
