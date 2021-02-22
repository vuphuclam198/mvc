<?php 

namespace Aht\Models;

use Aht\Models\TaskModel;
use Aht\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    function __construct(){
        parent::_init("tasks", 'id', new TaskModel());
    }
}