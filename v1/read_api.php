<?php
ini_set('display error',1);
//include vendor folder
require 'D:/xampp/phpMyAdmin/vendor/autoload.php';

use \Firebase\JWT\JWT;//class within firebase folder in jwt.php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("content-type: application/json; charset=utf-8");



include_once("../config/database.php");
include_once("../classes/Users.php");


$db=new Database();
$connection=$db->connect();

$user_obj=new Users($connection);
if($_SERVER['REQUEST_METHOD']=== "POST")
{
    $data=json_decode(file_get_contents("php://input"));

   //$headers=getallheaders();
 //$data->jwt=$headers['Authorization'];

    if(!empty($data->jwt))
    {



        try{

            $secret_key='owt123';
        
            $decoded_data= JWT::decode($data->jwt,$secret_key,array('HS512'));

            http_response_code(200);

            $user_id=$decoded_data->data->id;

        echo json_encode(array(
            "status"=>1,
            "message"=>'we got jwt tokn',
            "user_data"=>$decoded_data,
            "user_id"=>$user_id
        ));

        }
        catch(Exception $ex){
            http_response_code(500);//server error
            echo json_encode(array(
                "status"=>0,
                "message"=>$ex->getMessage()
               
            ));
        }
       

        
    }

}else 
    {
        http_response_code(502);
        echo json_encode(array(
            "status"=>0,
            "message"=>'check method'
        )); 
    }



?>