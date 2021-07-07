<?php

class Zodiac{
    public $name;
    public $from_dm;
    public $to_dm;

   
    private $conn;
    private $table_name;

public function __construct($db)
{
    $this->conn=$db;
    $this->table_name='zodiac';
}
public function get_Sign($dob)
{
   
   // $dob='0000-'.$month.'-'.$day;
    $sql="select name from ".$this->table_name." where '$dob' between from_dm and to_dm ";

   
    $obj=$this->conn->prepare($sql);
    
    $obj->execute();

    $data=$obj->get_result();
    
    return $data->fetch_assoc();


}


}

?>