<?php

namespace app\core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $routes = require 'app/routes/web.php';
        foreach ($routes as $key => $params) {
            $this->add($key, $params);
        }
    }

    public function add($roteKey, $routeParams)
    {
        $routeMask = '#^' . $roteKey . '$#';
        $this->routes[$routeMask] = $routeParams;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $key => $params) {
            if (preg_match($key, $url, $matches)) {
                $this->params = $params;

                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $class = 'app\controllers\\' . $this->params['controller'];
            if (class_exists($class)) {
                $action = $this->params['action'];
                if (method_exists($class, $action)) {
                    $controller = new $class($this->params);
                    $controller->$action();
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
            } else {
                header("HTTP/1.0 404 Not Found");
            }
        } else {
            header("HTTP/1.0 404 Not Found");
        }
    }

}