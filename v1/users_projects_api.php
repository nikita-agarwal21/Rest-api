<?php



//include vendor folder
require 'D:/xampp/phpMyAdmin/vendor/autoload.php';

use \Firebase\JWT\JWT;//class within firebase folder in jwt.php

//including header
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
//header("content-type: application/json; charset=utf-8");



include_once("../config/database.php");
include_once("../classes/Users.php");
//object
$db=new Database();
$connection=$db->connect();

$user_obj=new Users($connection);
if($_SERVER['REQUEST_METHOD']=== "GET")
{
    $headers=getallheaders();
    $jwt=$headers['Authorization'];

    try{
        $secret_key='owt123';


       $decoded_data= JWT::decode($jwt,$secret_key,array('HS512'));//jwt token,secret key,algorithm used
        
       $user_obj->user_id=$decoded_data->data->id;//within payload-> data variable ->user_arr nd the user id is within id key
      
       $projects=$user_obj->get_users_all_projects();
        //print_r($projects);
    
        if($projects->num_rows >0)
        {
                    $projects_arr=array();
            while($row=$projects->fetch_assoc()){
                $projects_arr[]=array(
                    "id"=>$row['id'],
                    "name"=>$row['name'],
    
                    "description"=>$row['description'],
                    "user_id"=>$row['user_id'],
                    "status"=>$row['status'],
    
                    "created_at"=>$row['created_at'],
    
    
    
                );
            }
            http_response_code(200);
            echo json_encode(array(
                'status' => 1,
                'message'=>$projects_arr
            ));
        }
        else {
            
            http_response_code(404);
            echo json_encode(array(
                'status' => 0,
                'message'=>'no projects found'
            ));
        }
    
    }
    catch(Exception $ex){

        http_response_code(500);
        echo json_encode(array(
            'status' => 0,
            'message'=>$ex->getMessage()
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