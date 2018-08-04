<?php

namespace app\core;

class View
{
    public function render($view, $params = [], $layout = 'main')
    {
        extract($params);

        if (file_exists('app/views/' . $view . '.php')) {
            ob_start();
            require 'app/views/' . $view . '.php';
            $content = ob_get_clean();
            require 'app/views/layouts/' . $layout . '.php';
        } else {
            echo 'Вид <b>' . $view . '</b> не найден';
        }
    }
}