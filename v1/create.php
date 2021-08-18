<?php

header('Access-Control-Allow-Origin: *'); //it allows all origin like localhost or any  domains/subdomains to access it
header('Content-type:application/json; charset=UTF-8');//data which we were getting inside request
header('Acess-Control-Allow-Methods:POST');//method type



include_once('../config/database.php');

include_once('../classes/student.php');

$db=new Database();
$connection =$db->connect();


$student = new Student($connection);

if($_SERVER['REQUEST_METHOD'] === "POST")
{


$data=json_decode(file_get_contents('php://input'));
//print_r($data);die;

if(!empty($data->name) && !empty($data->phone))
{
    
$student->name=$data->name;     //$name; //"nikki";
$student->phone=$data->phone;   //$phone; //"123456";


if($student->create_data())
{ 
    http_response_code(200);//returning ok value
    echo json_encode(array(
        'status' =>1,
        'message' =>'student created'
    ));
   
}
else{
    http_response_code(500);//500 internal server error
    echo json_encode(array(
        'status' =>0,
        'message' =>'failed to insert'
    ));
    
}
}
else {
    http_response_code(404);//404 php not found
    echo json_encode(array(
        'status' =>0,
        'message' =>'all values needed'
    ));
  
}
}

else {
    http_response_code(503);//503 service unavailable
    echo json_encode(array(
        'status' =>0,
        'message' =>'denied'
    ));
  
}




/*$student->name=$data->name;     //$name; //"nikki";
$student->phone=$data->phone;   //$phone; //"123456";


if($student->create_data())
{
    echo 'student created';
}
else{
    echo 'failed to insert';
}
} 
else {
    echo 'denied';
}

*/


?>