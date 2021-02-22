<?php 

namespace Aht\Models;

use Aht\Models\TaskResourceModel;

class TaskRepository 
{

    protected $model;

    function __construct()
    {
       return $this->model = new TaskResourceModel();
    }

    public function add($model)
    {
       return $this->model->save($model);
    }

    public function update($model)
    {
       return $this->model->save($model);
    }

    public function delete($id)
    {
       return $this->model->delete($id);
    }

    public function get($id)
    {   
        return $this->model->getById($id);
    }

    public function getAll()
    {
       return $this->model->getList();
    }
}