<?php
ini_set('display errors',1);

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

$data=json_decode(file_get_contents("php://input"));//data from body section
if(!empty($data->email) && !empty($data->password))
{
    $user_obj->email=$data->email;
   // $user_obj->password=$data->password;
    $user_data=$user_obj->check_login();
    if(!empty($user_data)){
        $name=$user_data['name'];
        $email=$user_data['email'];

        $password=$user_data['password'];

        if(password_verify($data->password,$password))//normal password,hash password
        {   

            $iss='localhost';
            $iat=time();
            $nbf=$iat+10;
            $exp=$iat+60;
            $aud="myusers";
            $user_arr_data=array(
                "id"=>$user_data['id'],
                "name"=>$user_data['name'],
                "email"=>$user_data['email'],
                
            );
            
            $secret_key='owt123';
                $payload_info=array(
                //  'iss'=> $iss,               //issued by (hostname)
                 //   'iat'=> $iat,               //issuer at time(creation time of api)
                 //   'nbf'=> $nbf,               //not before (after certain time interval we can use(this api can be used after some time) else we cant)
                 //  'exp'=> $exp,               //expiration time for d token(default is  1 hr)
                 //   'aud'=> $aud,               //audience claim(for which user)
                    'data'=>$user_arr_data,       //user data 
                );
               $jwt= JWT::encode($payload_info,$secret_key,'HS512');


            http_response_code(200);
            echo json_encode(array(
                'status' =>1,
                'jwt'=>$jwt,
                'message' =>'user logged in succesfully'
            ));
        }
        else{
            http_response_code(404);//404 php not found
            echo json_encode(array(
                'status' =>0,
                'message' =>'invalid crediential'
            )); 
        }


    }
    else{
        http_response_code(404);//404 php not found
        echo json_encode(array(
            'status' =>0,
            'message' =>'invalid crediential'
        ));  
    }

}
else{
    http_response_code(404);//404 php not found
    echo json_encode(array(
        'status' =>0,
        'message' =>'all values needed'
    ));
}


}
else{
    http_response_code(504);
    echo json_encode(array(
        'status' =>0,
        'message' =>'check method'
    ));
}


?>