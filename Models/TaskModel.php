<?php

namespace Aht\Models;

use Aht\Core\Model;

class TaskModel extends Model
{
    protected $id;
    protected $title;
    protected $description;
    protected $created_at;
    protected $updated_at;

    // protected $table = 'tasks';
    // protected $fillable = ['id','title','description','created_at','update_at'];

    public function getId(){
       return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }
}