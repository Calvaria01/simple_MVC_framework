<?php

namespace app\core;

use app\core\View;

class Controller
{
    protected View $view;
    protected Model $model;

    public function __construct(array $routes)
    {
        $this->view = new View($routes['page'], isset($_SESSION['User']));
        $this->model = $this->loadModel($routes['model']);
    }

    private function loadModel(string $model)
    {
        $path = 'app\models\\' . $model . 'Model';
        if (class_exists($path)) {
            return new $path();
        } else {
            View::renderError('Модель не найдена');
        }
    }
}
