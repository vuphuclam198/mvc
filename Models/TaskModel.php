<?php

namespace Aht\Models;

use Aht\Core\Model;

class TaskModel extends Model
{
    /* 
    * var $id;
    * var $title;
    * var $description;
    * var $created_at;
    * var $updated_at;
    * method getId() is access ID
    */

   protected $id;
   protected $title;
   protected $description;
   protected $created_at;
   protected $updated_at;

   public function getId()
   {
      return $this->id;
   }

   public function setId($id)
   {
      return $this->id = $id;
   }

   public function getTitle()
   {
      return $this->title;
   }

   public function setTitle($title)
   {
      return $this->title = $title;
   }

   public function getDesc(){
      return $this->description;
   }
 
   public function setDesc($description)
   {
      return $this->description = $description;
   }

   public function get_created_at()
   {
      return $this->created_at;
   }

   public function set_created_at($created_at)
   {
      return $this->created_at = $created_at;
   }

   public function get_update_at()
   {
      return $this->updated_at;
   }

   public function set_update_at($updated_at)
   {
      return $this->updated_at = $updated_at;
   }
}