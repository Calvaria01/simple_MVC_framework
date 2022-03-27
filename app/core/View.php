<?php

namespace app\core;

class View
{
    private string $title;
    private string $page;
    private bool $logon;
    private string $layout = 'default';
    private array $content;

    public static function renderError(string $text): void
    {
        echo $text;
        exit;
    }

    public function __construct(string $page, bool $logon)
    {
        $this->page = $page;
        $this->logon = $logon;
    }

    public function render(): void
    {
        $title = $this->title;
        $navbar = $this->getNavbar();
        $body = $this->getBody();
        require 'app/views/layout/' . $this->layout . '.php';
        unset($_SESSION['message']);
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /*public function getTitle(): string
    {
        switch ($this->page) {
            case 'index':
                return 'Список постов';
            case 'login':
                return 'Логин';
            case 'register':
                return 'Регистарция';
            case 'profile':
                return 'Профиль';
            default:
                return 'Bad title';
        }
    }*/

    private function getNavbar()
    {
        if ($this->logon) {
            $name = $this->content['User']['first_name'];
        }
        $navbar = $this->logon ? 'user' : 'guest';
        $path = 'app/views/navbar/' . $navbar . '.php';
        if (file_exists($path)) {
            ob_start();
            require_once $path;
            return ob_get_clean();
        } else {
            View::renderError('Navbar не найден');
        }
    }

    private function getBody()
    {
        if (isset($this->content)) {
            $content = $this->content;
        }
        $path = 'app/views/body/' . $this->page . '.php';
        if (file_exists($path)) {
            ob_start();
            require_once $path;
            return ob_get_clean();
        } else {
            View::renderError('страница' . $path . ' не найдена');
        }
    }

    public function setContent(array $content): void
    {
        $this->content = $content;
    }

    public function redirect(string $url): void
    {
        header('location:' . $url);
        exit;
    }

    public static function message(string $message): void
    {
        $_SESSION['message'] = $message;
    }
}
