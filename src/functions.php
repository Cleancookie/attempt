<?php

if (!function_exists('attempt')) {
    function attempt($callback)
    {
        try {
            return [null, $callback()];
        } catch (\Exception $e) {
            return [$e, null];
        }
    }
}
