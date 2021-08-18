<?php


//include vendor folder
require 'D:/xampp/phpMyAdmin/vendor/autoload.php';

use \Firebase\JWT\JWT;//class within firebase folder in jwt.php
//header
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("content-type: application/json; charset=utf-8");



include_once("../config/database.php");
include_once("../classes/Users.php");
//object
$db=new Database();
$connection=$db->connect();

$user_obj=new Users($connection);
if($_SERVER['REQUEST_METHOD']=== "POST")
{
    //param from body
    $data=json_decode(file_get_contents("php://input"));
    $headers=getallheaders();

    if(!empty($data->name) && !empty($data->description) && !empty($data->status)  )
    {

        try{
            $jwt=$headers['Authorization'];
            $secret_key='owt123';
        
            $decoded_data= JWT::decode($jwt,$secret_key,array('HS512'));

            $user_obj->user_id=$decoded_data->data->id;
            $user_obj->project_name=$data->name;
            $user_obj->description=$data->description;
            $user_obj->status=$data->status;

            if($user_obj->create_project())
            {
                http_response_code(200);
                echo json_encode(array(
                    'status' => 1,
                    'message'=>'project created'
                ));
            }
            else{
                http_response_code(500);
                echo json_encode(array(
                    'status' => 0,
                    'message'=>'failed to create project'
                ));
            }

        }catch(Exception $ex){
            http_response_code(500);//server error
            echo json_encode(array(
                "status"=>0,
                "message"=>$ex->getMessage()
               
            ));

        }
    }
    else{
        http_response_code(404);
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