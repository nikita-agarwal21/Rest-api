<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
        $operand1 = false;
	$operand2 = false;

        if ( isset($_GET['operand1']))
            $operand1 = $_GET['operand1'];

        if ( isset($_GET['operand2']))
            $operand2 = $_GET['operand2'];

        if ( !$operand1 || !$operand2 )
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "Parameter problem  ..."
             ));
             return;
        }

        $result = intval($operand1) + intval($operand2);

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