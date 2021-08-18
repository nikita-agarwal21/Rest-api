<?php
ini_set('display_errors',1);
header('Access-Control-Allow-Origin: *'); //it allows all origin like localhost or any  domains/subdomains to access it
//header('Content-type:application/json; charset=UTF-8');//data which we were getting inside request
header('Acess-Control-Allow-Methods:GET');//method type



include_once('../config/database.php');

include_once('../classes/student.php');

$db=new Database();
$connection =$db->connect();


$student = new Student($connection);

if($_SERVER['REQUEST_METHOD']=== 'GET')
{
$data=$student->get_all_data();
//print_r($data);
if($data->num_rows>0)
{
    //data inside table
    $students['records']=array();
    while($row= $data->fetch_assoc())//fetch_array,fetch_object
    {
        array_push($students['records'],array(
    'id'=>$row['id'],
    'name'=>$row['name'],
    'phone'=>$row['phone'],
    'created_at'=>date('d-m-Y',strtotime($row['created_at']))
    

        ));
    }
   http_response_code(200);//ok
   echo json_encode(array(
       'status' =>1,
       'data' => $students['records']
   )) ;
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