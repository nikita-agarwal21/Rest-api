<?php 
  class AddHelper 
  { 
     private $operand1, $operand2;

     public function __construct() 
     { 
         if ( isset($_POST['operand1'])) 
               $this->operand1 = $_POST['operand1'];

         if ( isset($_POST['operand2'])) 
               $this->operand2 = $_POST['operand2'];
     }

     public function getOperand1() 
     { 
         if ( !$this->operand1 ) 
             return ''; 
         else 
             return $this->operand1; 
     } 

     public function getOperand2() 
     { 
         if ( !$this->operand2 ) 
             return ''; 
         else 
             return $this->operand2; 
     } 
  } 
?>