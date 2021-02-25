<?php

namespace Aht\Controllers;

use Aht\Core\Controller;
use Aht\Models\TaskModel;
use Aht\Models\TaskRepository;
use Aht\Core\ResourceModel;

class TasksController extends Controller
{

    protected $taskRepository;

    public function __construct(){
        $this->taskRepository = new taskRepository();
    }   

    function index()
    {
        $d['tasks'] = $this->taskRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {

            $task= new TaskModel();
            $task->setTitle($_POST["title"]);
            $task->setDesc($_POST["description"]);

            if ($this->taskRepository->add($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        // list ọbject with getId();
        $d["task"] = $this->taskRepository->get($id);

        if (isset($_POST["title"]))
        {
            $taskModel = new TaskModel();
            $taskModel->setId($id);
            $taskModel->setTitle($_POST["title"]);
            $taskModel->setDesc($_POST["description"]);
            
            if ($this->taskRepository->update($taskModel))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->taskRepository->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>