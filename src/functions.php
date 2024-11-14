<?php

if (!function_exists('attempt')) {
    function attempt($callback)
    {
        try {
            return [null, $callback()];
        } catch (\Throwable $e) {
            return [$e, null];
        }
    }
}
