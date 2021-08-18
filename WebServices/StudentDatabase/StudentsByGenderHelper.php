<?php 
   class StudentsByGenderHelper 
   { 
      private $gender;

      public function __construct() 
      { 
           if ( isset($_POST['gender'])) 
           $this->gender = $_POST['gender']; 
      }

      public function isGenderChecked($par) 
      { 
           if ( !$this->gender ) return ''; 
           if ( $this->gender == $par ) 
                 return 'Checked'; 
           else  
                 return ''; 
      }       
   } 
?>