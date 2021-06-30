<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
        $numbers=array();
	$result=0;
        if ( isset($_GET['numbers']))
            $numbers = $_GET['numbers'];

       

        if ( !$numbers )
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "Parameter problem  ..."
             ));
             return;
        }
foreach ($numbers as $number)
{
   
       $result += intval($number);
        
}
        http_response_code(200);
        echo json_encode(array(
            "status" => 1,
            "result" => (int)$result
        ));
        return;  
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