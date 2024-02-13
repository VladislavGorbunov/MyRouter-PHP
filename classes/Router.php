<?php

namespace Vlad\Router;

class Router
{
    private static $get_routes = [];
    private static $post_routes = [];

    static public function get($route, $controller)
    {
        array_push(
            self::$get_routes,
            [
                'route' => $route,
                'controller' => $controller,
                'method' => 'GET',
            ]
        );
    }

    static public function post($route, $controller)
    {
        array_push(
            self::$post_routes,
            [
                'route' => $route,
                'controller' => $controller,
                'method' => 'POST',
            ]
        );
    }

    static public function run()
    {
        $url = $_SERVER['REQUEST_URI'];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            foreach (self::$get_routes as $rout) {
                $pattern = $rout['route'];
                $pattern = '^' . $pattern . '$';
                
                if (preg_match('#' . $pattern . '#', $url, $matches)) {
                    $controller = explode('::', $rout['controller'])[0] ? explode('::', $rout['controller'])[0] : 'BaseController';
                    $method = explode('::', $rout['controller'])[1] ? explode('::', $rout['controller'])[1] : 'index';
                    $controller = "\Vlad\Controllers\\$controller";
                    $controllerObj = new $controller;
                    
                    $controllerObj->$method();
                    echo '<pre>';
                    var_dump($matches);
                    echo '</pre>';
                    
                    break;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            foreach (self::$post_routes as $rout) {
                $pattern = $rout['route'];
                $pattern = '^' . $pattern . '$';
                
                if (preg_match('#' . $pattern . '#', $url, $matches)) {
                    echo $controller = explode('::', $rout['controller'])[0];
                    echo $method = explode('::', $rout['controller'])[1];
                }
            }
        }
    }

    
}
