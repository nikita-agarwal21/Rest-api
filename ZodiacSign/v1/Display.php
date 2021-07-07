
<?php
ini_set('display_errors',1);
header('Access-Control-Allow-Origin: *'); //it allows all origin like localhost or any  domains/subdomains to access it
//header('Content-type:application/json; charset=UTF-8');//passing json data /data type while calling this api
header('Acess-Control-Allow-Methods:GET');//method type



include_once('../config/database.php');

include_once('../classes/Zodiac.php');

$db=new Database();
$connection =$db->connect();


$zodiac = new Zodiac($connection);


if($_SERVER['REQUEST_METHOD']=== 'GET')
{
    $month=false;
    $day=false;

if(isset($_GET['month']))
    $month=$_GET['month'];
if(isset($_GET['day']))
    $day=$_GET['day'];

   
    if(!$month && !$day){
        http_response_code(404);
        echo json_encode(array(
             "status" => 0,
             "message" => "Parameter problem  ..."
        ));
        return;
    }
    $dob='0000-'.$month.'-'.$day;

       
       $zodiac_sign = $zodiac->get_sign($dob);
  
         if(!empty($zodiac_sign))
         {
   
           http_response_code(200);//ok
          echo json_encode(array(
           'status' =>1,
           'data' =>$zodiac_sign
          )) ;
          return;
         }
        else{
           http_response_code(404);//404 data not found
            echo json_encode(array(
           'status' =>0,
             'message' =>'check the input'
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