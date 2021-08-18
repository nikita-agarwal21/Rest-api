<?php

header('Access-Control-Allow-Origin: *'); //it allows all origin like localhost or any  domains/subdomains to access it
header('Content-type:application/json; charset=UTF-8');//passing json data /data type while calling this api
header('Acess-Control-Allow-Methods:POST');


include_once("../config/database.php");
include_once("../classes/Users.php");

$db=new Database();
$connection=$db->connect();

$user_obj=new Users($connection);
if($_SERVER['REQUEST_METHOD']=== "POST")
{
    $data=json_decode(file_get_contents("php://input"));
    if(!empty($data->name) && !empty($data->email) && !empty($data->password))
    {
        $user_obj->name=$data->name;
        $user_obj->email=$data->email;
      //  $user_obj->password=$data->password;

        $user_obj->password=password_hash($data->password,PASSWORD_DEFAULT);


$email_data =$user_obj->check_email();
if(!empty($email_data))
{
//already exiisting email 
    http_response_code(500);
    echo json_encode(array(
    'status' => 0,
    'message'=>'user already exists try another email'
));
}
else {
    if($user_obj->create_user()){
        http_response_code(200);
        echo json_encode(array(
            'status' => 1,
            'message'=>'user has created'
        ));
    }else{
            http_response_code(500);
            echo json_encode(array(
                'status' => 0,
                'message'=>'failed to save user'
            ));
    }
       
}
    }
    else{
        http_response_code(500);
        echo json_encode(array(
            'status' => 0,
            'message'=>'all data needed'
        ));
    }
}
else{
    http_response_code(503);
    echo json_encode(array(
        'status' => 0,
        'message'=>'access denied'
    ));
}







?>