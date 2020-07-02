<?php

namespace cubinx;

class Loader
{
    public static function load(...$instances)
    {
        foreach ($instances as $instance) {
            $instance = \str_replace(['_', '\\'], '/', $instance);
            require_once __DIR__ . \DIRECTORY_SEPARATOR . $instance . '.php';
        }
    }
}