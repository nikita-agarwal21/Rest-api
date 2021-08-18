<?php
  class Student
  {  
     private $usn;
     private $name;
     private $gender;
     private $phoneNumber;
     private $email;
     private $city;

     public function __construct($usn, $name, $gender, $phoneNumber, $email, $city)
     {
       $this->usn = $usn;
       $this->name = $name;
       $this->gender = $gender;
       $this->phoneNumber = $phoneNumber;
       $this->email = $email;
       $this->city = $city;  
     }

     public function getUsn()
     {
        return $this->usn;
     }

     public function setUsn($usn)
     {
        $this->usn = $usn;
     }

     public function getName()
     {
        return $this->name;
     }

     public function setName($name)
     {
        $this->name = $name;
     }

     public function getGender()
     {
        return $this->gender;
     }

     public function setGender($gender)
     {
        $this->gender = $gender;
     }

     public function getPhoneNumber()
     {
        return $this->phoneNumber;
     }

     public function setPhoneNumber($phoneNumber)
     {
        $this->phoneNumber = $phoneNumber;
     }

     public function getEmail()
     {
        return $this->email;
     }

     public function setEmail($email)
     {
        $this->email = $email;
     }

     public function getCity()
     {
        return $this->city;
     }

     public function setCity($city)
     {
        $this->city = $city;
     }
  } 
?>


