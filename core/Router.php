<?php

class Router
{
    public static $instance;
    public static $configuration = [];
    public static $routes = [];
    public static $query_routes = [];
    public static $selected = [];
    public static $uri;

    public static function path($methods, $paths, $callback)
    {
        var_dump(213123);
        exit;

        $methods = \is_string($methods) ? [$methods] : $methods;
        $paths = \is_string($paths) ? [$paths] : $paths;
        foreach ($methods as $method) {
            foreach ($paths as $path) {
                self::$routes[] = array('method' => $method, 'pattern' => $path, 'callback' => $callback);
            }
        }
    }
}