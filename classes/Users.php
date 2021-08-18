<?php

class Users{

    public $name;
    public $email;
    public $password;
    public $user_id;
    public $project_name;
    public $desription;
    public $status;


    private $conn;
    private $users_tbl;
    private $project_tbl;

    public function __construct($db)
    {
        $this->conn=$db;
        $this->users_tbl="tbl_users";
        $this->project_tbl="tbl_projects";
    }
    public function create_user(){
       $user_query='insert into '.$this->users_tbl.' set name = ?,email= ?,password= ?';
       $user_obj=$this->conn->prepare($user_query);
       $user_obj->bind_param('sss',$this->name,$this->email,$this->password);
       if($user_obj->execute())
          {
    return true;
         }
     return false;

    }

public function check_email()
{
    $email_query='select * from '.$this->users_tbl.' where email =? ';
    $usr_obj=$this->conn->prepare($email_query);
    $usr_obj->bind_param('s',$this->email);
    if($usr_obj->execute())
    {
        $data=$usr_obj->get_result();
return $data->fetch_assoc();
   }
return array();


}
public function check_login()
{
    $email_query='select * from '.$this->users_tbl.' where email =? ';
    $usr_obj=$this->conn->prepare($email_query);
    $usr_obj->bind_param('s',$this->email);
    if($usr_obj->execute())
    {
        $data=$usr_obj->get_result();
return $data->fetch_assoc();
   }
return array();

  
}

public function create_project(){

    $project_query='insert into '.$this->project_tbl.' set  user_id = ?,name = ?,description = ?,status = ?';
    $project_obj=$this->conn->prepare($project_query);
//sanitize input
    $project_name=htmlspecialchars(strip_tags($this->project_name));
    $description=htmlspecialchars(strip_tags($this->description));
    $status=htmlspecialchars(strip_tags($this->status));
//bind param
    $project_obj->bind_param('isss',$this->user_id,$project_name,$description,$status);

    if($project_obj->execute())
    {
        return true;
    }
    else {
        
        return false;
    }

}
public function get_all_projects()
{
    $project_query='select * from  '.$this->project_tbl.'  order by id';// DESC';//in descending order

    $project_obj=$this->conn->prepare($project_query);

    $project_obj->execute();
    return $project_obj->get_result();
}


public function get_users_all_projects()
{
    $project_query='select * from  '.$this->project_tbl.' where user_id= ? order by id';// DESC';//in descending order

    $project_obj=$this->conn->prepare($project_query);
$project_obj->bind_param('i',$this->user_id);

    $project_obj->execute();
    return $project_obj->get_result();
}


}



?>