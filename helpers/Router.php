<?php

require_once 'controllers/DefaultController.php';
class Router
{
    private static $routes = [];

    private static $default = [];

    public function __construct() {}

    public static function add($path, $method, $controller)
    {
        if (isset(self::$routes[$path][$method])) {
            throw new Exception('Route already exists');
        }
        self::$routes[$path][$method] = $controller;
    }

    public static function addDefault($controller = [DefaultController::class, 'notFound'])
    {
        self::$default = $controller;
    }

    public static function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];
        $method =  $_SERVER['REQUEST_METHOD'];
        $controller = self::$routes[$path][$method] ?? null;
        if (empty($controller)) {
            $controller = self::$default;
        }
        call_user_func($controller);
    }
}
