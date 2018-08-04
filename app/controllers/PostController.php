<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Post;

class PostController extends Controller
{
    public function all()
    {
        $posts = Post::all();
        $params = [
            'title' => 'Все сообщения',
            'posts' => $posts
        ];
        $this->view->render('post/all', $params, 'dark');
    }
}