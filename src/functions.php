<?php

if (!function_exists('attempt')) {
    /**
     * @template T
     * @param callable():T $callback The callback to attempt
     * @return array{0: \Throwable|null, 1: T|null} A tuple where the first item is an error (if any) and the second item is the result of the callback
     */
    function attempt($callback)
    {
        try {
            return [null, $callback()];
        } catch (\Throwable $e) {
            return [$e, null];
        }
    }
}
