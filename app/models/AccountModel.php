<?php

namespace app\models;

use app\core\Model;
use app\core\View;

class AccountModel extends Model
{
    public function userExist(string $mail): bool
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $binds = [ 'email' => $mail];
        $result = $this->fetch($sql, $binds);
        return !empty($result);
    }

    public function login(array $params): bool
    {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $result = $this->fetch($sql, $params);
        if (!empty($result)) {
            $_SESSION['User'] = array_shift($result);
            $_SESSION['User_image']['user_id'] = $_SESSION['User']['user_id'];
            $_SESSION['User_image']['image'] = $_SESSION['User']['image'];
            unset($_SESSION['User']['image']);
            return true;
        }
        return false;
    }

    public function editUser(array $params)
    {
        $sql = "UPDATE users
            SET last_name = :last_name, first_name = :first_name, email = :email, password = :password
            WHERE user_id = :user_id";
        $this->query($sql, $params);
    }

    public function savePhoto(array $data)
    {
        $imgDir = "public/img";
        $tmp = $data['tmp_name'];
        if (is_uploaded_file($tmp)) {
            $info = getimagesize($tmp);

            if (preg_match('{image/(.*)}is', $info['mime'], $p)) {
                $name = "ProfilePic" . $_SESSION['User']['user_id'] . "." . $p[1];
                $_SESSION['User_image']['image'] = $name;

                $path = "$imgDir/" . $name;
                    move_uploaded_file($tmp, $path);
            } else {
                View::renderError('Недопустимый формат');
            }
        } else {
            View::renderError("Ошибка загрузки №{$data['error']}!");
        }
    }

    public function addPhoto(array $param)
    {
        $sql = "UPDATE users
            SET image = :image
            WHERE user_id = :user_id";
        $this->query($sql, $param);
    }

    public function validateData(array $user): bool
    {
        if (strlen($user['first_name'] > 20)) {
            return false;
        }
        if (strlen($user['last_name']) > 20) {
            return false;
        }
        if (!$user['email']) {
            return false;
        }
        if ($user['password'] !== $user['password_repeat']) {
            return false;
        }

        return true;
    }

    public function register(array $user)
    {
        unset($user['password_repeat']);
        $sql = "INSERT INTO users
            (last_name, first_name, email, password)
            VALUES
            (:last_name, :first_name, :email, :password)";
        $this->query($sql, $user);
    }
}
