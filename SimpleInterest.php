<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
        $princi = false;
	    $time = false;
        $rate = false;

        if ( isset($_GET['princi']))
            $princi = $_GET['princi'];

        if ( isset($_GET['time']))
            $time = $_GET['time'];

        if ( isset($_GET['rate']))
            $rate = $_GET['rate'];

        if ( !$princi || !$time || !$rate )
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "Parameter problem  ..."
             ));
             return;
        }

        $result = (intval($princi) * intval($time) * intval($rate))/100;

        http_response_code(200);
        echo json_encode(array(
            "status" => 1,
            "result" => $result
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