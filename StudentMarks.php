<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
        $marks = false;
        

        if ( isset($_GET['marks']))
            $marks = $_GET['marks'];

        if ( !$marks )
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "No parameter ..."
             ));
             return;
        }

	$m = (int)$marks;
   
        if ( $m >= 0 && $m <=  100)
        {
	     switch ($m) 
             {
                case $m>70 :
                   $result = 'FCD';
                   break;

                case $m>60 :
                   $result = 'FC';
                   break;

                case $m>50 :
                   $result = 'SC';
                   break;

                case $m>35 :
                   $result = 'PASS';
                   break;

                case $m<35 :
                   $result = 'FAIL';
                   break;

                

                
             }	

	     http_response_code(200);
             echo json_encode(array(
                   "status" => 1,
                   "message" => $result
             ));
             return;  
        }
        else
        {
	     http_response_code(404);
             echo json_encode(array(
                    "status" => 0,
                    "message" => "Invalid input ..."
             ));
             return;
        }
     }
     else
     {
             http_response_code(500);
             echo json_encode(array(
                   "status"=>0,
                   "message"=>"Access denied"
             ));
             return;
     }
?>

