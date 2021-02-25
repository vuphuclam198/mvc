<?php

namespace Aht\Core;

class Model
{
    /* 
    *get_object_vars() lấy giá trị thuộc tính model type []
    */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
?>