<?php
  class YoutubeHelper
  {
     private $name;

     public function __construct()
     {
         if ( isset($_POST['name']))
               $this->name= $_POST['name'];


     }

     public function getname()
     {
         if ( !$this->name)
             return '';
         else
             return $this->name;
     }


  }
?>
