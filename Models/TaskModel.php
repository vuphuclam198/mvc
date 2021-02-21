<?php

namespace Aht\Models;

class TaskModels
{
    protected $id;
    protected $title;
    protected $description;

    public function getId(){
       return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }
}