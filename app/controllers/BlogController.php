<?php

namespace app\controllers;

use app\core\Controller;

class BlogController extends Controller
{
    public function indexAction(): void
    {
        $this->view->setTitle('Список постов');
        $content['Posts'] = $this->model->selectAllPosts();
        if (isset($_SESSION['User'])) {
            $content['User']['first_name'] = $_SESSION['User']['first_name']; // исправить
        }
        $this->view->setContent($content);
        $this->view->render();
    }
}
