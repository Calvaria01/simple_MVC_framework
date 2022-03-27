<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;

class AccountController extends Controller
{
    public function loginAction(): void
    {
        if (isset($_POST['login'])) {
            if ($this->model->userExist($_POST['user']['email'])) {
                if ($this->model->login($_POST['user'])) {
                    View::message('Успешный логин');
                    $this->view->redirect('profile');
                } else {
                    View::message('Неверный пароль');
                    $this->view->redirect('login');
                }
            } else {
                View::message('Такого пользователя не существует!');
                $this->view->redirect('login');
            }
        }
        $this->view->setTitle('Логин');
        $this->view->render();
    }

    public function registerAction(): void
    {
        if (isset($_POST['register'])) {
            if (!$this->model->validateData($_POST['user']) || $this->model->userExist($_POST['user']['email'])) {
                View::message('Неверный данные или пользователь с таким email уже существует');
                $_SESSION['reg_data'] = $_POST['user'];
                $this->view->redirect('register');
            } else {
                $this->model->register($_POST['user']);
                View::message('Регистрация успешная. Можете залогиниться');
                $this->view->redirect('index');
            }
        }
        if (isset($_SESSION['reg_data'])) {
            $this->view->setContent($_SESSION['reg_data']);
            unset($_SESSION['reg_data']);
        }
        $this->view->setTitle('Регистрация');
        $this->view->render();
    }

    public function profileAction(): void
    {
        if (isset($_SESSION['User'])) {
            $content = $_SESSION;
            $this->view->setContent($content);
            $this->view->setTitle('Профиль');
            $this->view->render();
        } else {
            $this->view->redirect('login');
        }
    }

    public function logoutAction(): void
    {
        unset($_SESSION['User']);
        View::message('Вы вышли из профиля');
        $this->view->redirect('index');
    }

    public function editAction(): void
    {
        if (isset($_POST['edit'])) {
            foreach ($_POST['user'] as $key => $value) {
                $_SESSION['User'][$key] = $value;
            }
            $this->model->editUser($_SESSION['User']);
            View::message('Данные успешно изменены');
        }
        $this->view->redirect('profile');
    }

    public function photoAction(): void
    {
        if (isset($_POST['photo'])) {
            $this->model->savePhoto($_FILES['avatar']);
            $this->model->addPhoto($_SESSION['User_image']);
            View::message('Фото профиля успешно изменено');
        }
        $this->view->redirect('profile');
    }
}
