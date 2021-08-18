<?php

class Student{
    public $name;
    public $phone;
public $id;//for update

    private $conn;
    private $table_name;

public function __construct($db)
{
    $this->conn=$db;
    $this->table_name='tbl_students';
}
public function create_data(){
    $query='insert into '. $this->table_name.' set name = ? ,phone = ? ';

    $obj=$this->conn->prepare($query);
//sanitization-removal of special chars
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->phone=htmlspecialchars(strip_tags($this->phone));

    $obj->bind_param('ss',$this->name,$this->phone);

    if($obj->execute())
    {
        return true;
    }
    return false;
}

//read all data 

public function get_all_data()
{
    $sql_query='select * from '. $this->table_name;
    $std_obj=$this->conn->prepare($sql_query);

    $std_obj->execute();
    return $std_obj->get_result();
}

//read single student data
public function get_single_student()
{
    $sql='select * from '.$this->table_name.' where id= ?';
    $obj=$this->conn->prepare($sql);
    $obj->bind_param('i',$this->id);
    $obj->execute();

    $data=$obj->get_result();
    return $data->fetch_assoc();


}
//update student
public function update()
{
    $update_query='update tbl_students set name= ?, phone=? where id=? ';

    $query_obj=$this->conn->prepare($update_query);

//sanitization-removal of special chars
$this->name=htmlspecialchars(strip_tags($this->name));
$this->phone=htmlspecialchars(strip_tags($this->phone));

$this->id=htmlspecialchars(strip_tags($this->id));
$query_obj->bind_param('ssi',$this->name,$this->phone,$this->id);

if($query_obj->execute())
{
    return true;

}
return false;

}

//delete
public function delete()
{
    $sql='delete from '.$this->table_name.' where id=? ';
    $obj=$this->conn->prepare($sql);

    $this->id=htmlspecialchars(strip_tags($this->id));
    $obj->bind_param('i',$this->id);
    if($obj->execute())
    {
        return true;
    }
        
        return false;
    
}

}

?>