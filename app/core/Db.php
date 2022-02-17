<?php

namespace app\core;

use PDO;

class Db
{
    public PDO $pdo;

    public function __construct()
    {
        $config = require 'app/config/db_params.php';
        try {
            $this->pdo = new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
                $config['user'],
                $config['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
        }
    }
}