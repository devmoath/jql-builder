<?php

if (! function_exists('tap')) {
    /**
     * @param  mixed  $value
     * @param  callable  $callback
     * @return mixed
     */
    function tap(mixed $value, callable $callback): mixed
    {
        $callback($value);

        return $value;
    }
}

if (! function_exists('array_wrap')) {
    /**
     * @param  mixed  $value
     * @return array<int, mixed>
     */
    function array_wrap(mixed $value): array
    {
        return is_array($value) ? $value : [$value];
    }
}

if (! function_exists('value')) {
    /**
     * @param  mixed  $value
     * @param  mixed  ...$args
     * @return mixed
     */
    function value(mixed $value, mixed ...$args): mixed
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }
}
