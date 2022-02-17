<?php

namespace app\core;

use app\core\Db;
use PDO;

class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = ( new Db() ) -> pdo;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetch($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchALl(PDO::FETCH_ASSOC);
    }
}
