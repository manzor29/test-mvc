<?php

namespace app\core;

use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
    public function render($view, $params = [])
    {
        $loader = new Twig_Loader_Filesystem('app/views');
        $twig = new Twig_Environment($loader);

        $params['layout'] = (isset($params['layout'])) ? 'layouts/' . $params['layout'] . '.php' : 'layouts/main.php';

        echo $twig->render($view . '.php', $params);
    }
}