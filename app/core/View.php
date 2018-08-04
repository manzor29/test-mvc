<?php

namespace app\core;

use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
    /**
     * @param $view
     * @param array $params
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render($view, $params = [])
    {
        $loader = new Twig_Loader_Filesystem('app/views');
        $twig = new Twig_Environment($loader);

        $params['layout'] = (isset($params['layout'])) ? 'layouts/' . $params['layout'] . '.php' : 'layouts/main.php';

        echo $twig->render($view . '.php', $params);
    }
}