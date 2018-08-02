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
            $controller = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($controller)) {
                echo 'Контроллер найден';
            } else {
                echo 'Контроллер <b>' . $controller . '</b> не найден';
            }
        } else {
            echo 'Роут не найден';
        }
    }

}