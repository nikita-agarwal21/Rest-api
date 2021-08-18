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
     if(!empty($data->name) && !empty($data->phone) && !empty($data->id))
     {
         $student->name=$data->name;
         $student->phone=$data->phone;
         $student->id=$data->id;

         if($student->update())
         {
  
            http_response_code(200);//server ok
            echo json_encode(array(
                'status'=>1,
                'message'=>' updated student data'
            ));
         }
         else {
             
            http_response_code(500);//server error
            echo json_encode(array(
                'status'=>0,
                'message'=>'failed to update data'
            ));
         }

     }

     else {
             
        http_response_code(404);//data not found
        echo json_encode(array(
            'status'=>0,
            'message'=>'all data required'
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






?>