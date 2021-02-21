<?php

namespace Aht;

use Aht\Controllers\tasksController;
use Aht\Request;
use Aht\Router;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = ucfirst($this->request->controller . "Controller");
        $file = 'Aht\\Controllers\\' . $name;
        $controller = new $file();
        return $controller;
    }
}
?>
