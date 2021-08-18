
<?php
ini_set('display_errors',1);
header('Access-Control-Allow-Origin: *'); //it allows all origin like localhost or any  domains/subdomains to access it
header('Content-type:application/json; charset=UTF-8');//passing json data /data type while calling this api
header('Acess-Control-Allow-Methods:POST');//method type



include_once('../config/database.php');

include_once('../classes/student.php');

$db=new Database();
$connection =$db->connect();


$student = new Student($connection);


if($_SERVER['REQUEST_METHOD']=== 'POST')
{
    $param=json_decode(file_get_contents('php://input'));
    if(!empty($param->id)){
        $student->id=$param->id;
       $student_data= $student->get_single_student();
  //print_r( $student_data);
if(!empty($student_data))
{
   
    http_response_code(200);//ok
    echo json_encode(array(
        'status' =>1,
        'data' =>$student_data
    )) ;
}
else{
    http_response_code(404);//404 data not found
    echo json_encode(array(
        'status' =>0,
        'message' =>'student not found'
    ));
}
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