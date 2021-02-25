<?php 

namespace Aht\Models;

use Aht\Models\TaskResourceModel;

class TaskRepository 
{

    protected $taskResourceModel;

    function __construct()
    {
       return $this->taskResourceModel = new TaskResourceModel();
    }

    public function add($model)
    {
        return $this->taskResourceModel->save($model);
    }

    public function update($model)
    {
      return $this->taskResourceModel->save($model);
    }

    public function delete(int $id)
    {
       return $this->taskResourceModel->delete($id);
    }

    public function get(int $id)
    {   
        return $this->taskResourceModel->getById($id);
    }

    public function getAll()
    {
       return $this->taskResourceModel->getList();
    }
}