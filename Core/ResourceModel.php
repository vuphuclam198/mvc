<?php

namespace Aht\Core;

use Aht\Core\Model;
use Aht\Config\Database;
use Aht\Core\ResourceModelInterface;
use Aht\Models\TaskModel;

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

        // var_dump($model);
    }

    public function save($model)
    {
        $keyProperties = array();
        $PropertiesValue = array();
        $updateProperties = array();
        $properties = $model->getProperties();


        if ($model->getId() === null) {
            foreach ($properties as $key=>$value) {
                array_push($keyProperties, $key);
                array_push($PropertiesValue, ':' . $key);
            }

            $string_properties = implode(',', $PropertiesValue);
            $string_key = implode(',', $keyProperties);

            $sql = "INSERT INTO $this->table ($string_key) VALUES ($string_properties)";
            $req = Database::getBdd()->prepare($sql);
    
            return $req->execute($properties);

        }else {
                $id = $model->getId();

                foreach($properties as $key=>$value) {
                    array_push($updateProperties,$key . '= :'.$key);
                }

                $columns = implode(',', $updateProperties);

                $sql = "UPDATE $this->table SET $columns WHERE id = $id";
                $req = Database::getBdd()->prepare($sql);
        
                return $req->execute($properties);
            }
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