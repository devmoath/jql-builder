<?php

if (! function_exists('tap')) {
    function tap(mixed $value, callable $callback): mixed
    {
        $callback($value);

        return $value;
    }
}
