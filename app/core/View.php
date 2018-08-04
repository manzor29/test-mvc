<?php

namespace app\core;

class View
{
    public $path;
    public $route;
    public $layout = 'main';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $params = [])
    {
        if (file_exists('app/views/' . $this->path . '.php')) {
            ob_start();
            require 'app/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'app/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'Вид <b>' . $this->path . '</b> не найден';
        }
    }
}