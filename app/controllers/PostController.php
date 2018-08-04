<?php

namespace app\controllers;

use app\core\Controller;

class PostController extends Controller
{
    public function all()
    {
        $this->view->render('Все посты');
    }
}