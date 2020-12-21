<?php

if (!function_exists('base_path')) {
    /**
     * @param string $path
     * @return string
     */
    function base_path(string $path) : string
    {
        return __DIR__ . '/../..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}