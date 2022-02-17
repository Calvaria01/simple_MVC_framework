<?php

namespace app\models;

use app\core\Model;

class BlogModel extends Model
{
    public function selectAllPosts(): array
    {
        $sql = "SELECT * FROM posts";
        return $this->fetch($sql);
    }
}
