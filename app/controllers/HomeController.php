<?php

namespace app\controllers;

use app\core\Controller;

class HomeController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $params = [
            'title' => 'Главная страница',
        ];

        $this->view->render('index', $params);
    }
}