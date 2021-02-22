<?php

namespace Aht\Controllers;

use Aht\Core\Controller;
use Aht\Models\Task;
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
            require(ROOT . 'Models/Task.php');

            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task = new Task();
        $d["task"] = $this->taskRepository->get($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
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