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
            $class = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($class)) {
                $action = $this->params['action'];
                if (method_exists($class, $action)) {
                    $controller = new $class($this->params);
                    $controller->$action();
                } else {
                    echo 'Метод <b>' . $action . '</b> не найден';
                }
            } else {
                echo 'Контроллер <b>' . $class . '</b> не найден';
            }
        } else {
            echo 'Роут не найден';
        }
    }

}