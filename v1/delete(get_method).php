<?php
ini_set('display_errors',1);
header('Access-Control-Allow-Origin: *'); //it allows all origin like localhost or any  domains/subdomains to access it
//header('Content-type:application/json; charset=UTF-8');//passing json data /data type while calling this api
header('Acess-Control-Allow-Methods:GET');//method type



include_once('../config/database.php');

include_once('../classes/student.php');

$db=new Database();
$connection =$db->connect();


$student = new Student($connection);


if($_SERVER['REQUEST_METHOD']=== 'GET')
{
$student_id=isset($_GET['id']) ? $_GET['id'] : '';
if(!empty($student_id))
{
$student->id=$student_id;//slicing student id from obj student
if($student->delete())
{
    http_response_code(200);//ok
    echo json_encode(array(
        'status'=>1,
        'message'=>'student detail deleted '
    ));
}
else {
    http_response_code(500);//server error
    echo json_encode(array(
        'status'=>0,
        'message'=>'failed to delete '
    ));
    
}
}else {
    
    http_response_code(404);//not found
    echo json_encode(array(
        'status'=>0,
        'message'=>'all data needed'
    ));
}



}
else{
    http_response_code(503);//service unavailable;
    echo json_encode(array(
'status'=>0,
'message' =>'access denied'
    ));
}



?>