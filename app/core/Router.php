<?php

namespace app\core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function run()
    {
        echo 'работает роутер';
    }

}