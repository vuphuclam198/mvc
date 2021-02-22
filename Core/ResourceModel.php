<?php

namespace Aht\Core;

use Aht\Core\Model;
use Aht\Config\Database;
use Aht\Core\ResourceModelInterface;
use PDO;

class ResourceModel implements ResourceModelInterface
{

    protected $table;
    protected $id;
    protected $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->model = $model;
        $this->id    = $id;
    }

    public function save($model)
    {
     
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

    public function getList()
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
}