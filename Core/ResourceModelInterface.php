<?php

namespace Aht\Core;

interface ResourceModelInterface
{

    public function _init($table, $id, $model);
    
    public function save($model);

    public function delete($model);

    public function getList();

    public function getById($id);
}