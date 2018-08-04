<?php

namespace app\controllers;

use app\core\Controller;

class PostController extends Controller
{
    public function all()
    {
        $params = [
            'title' => 'Все сообщения',
            'posts' => [
                [
                    'user' => 'John',
                    'message' => 'Hello!!!'
                ],
                [
                    'user' => 'michael',
                    'message' => 'How are you?'
                ],

            ]
        ];
        $this->view->render('post/all', $params, 'dark');
    }
}