<?php 
  class SearchByUsnHelper 
  { 
     private $usn;

     public function __construct() 
     { 
         if ( isset($_POST['usn'])) 
               $this->usn= $_POST['usn'];

         
     }

     public function getusn() 
     { 
         if ( !$this->usn) 
             return ''; 
         else 
             return $this->usn; 
     } 

    
  } 
?>