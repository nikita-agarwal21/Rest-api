<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
        $operand1 = false;
	$operand2 = false;
$operator=false;
        if ( isset($_GET['operand1']))
            $operand1 = $_GET['operand1'];

        if ( isset($_GET['operand2']))
            $operand2 = $_GET['operand2'];
        if ( isset($_GET['operator']))
            $operator = $_GET['operator'];

        if ( !$operand1 || !$operand2 || !$operator )
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "Parameter problem  ..."
             ));
             return;
        }

	
   
        if ( $operator == 'add'|| $operator == 'sub' || $operator == 'mul' || $operator == 'div' )
        {
	     switch ($operator) 
             {
                case 'add' :
                   $result = intval($operand1) + intval($operand2);
                   break;

                case 'sub' :
                   $result = intval($operand1) - intval($operand2);
                   break;

                case 'div' :
                   $result = intval($operand1) / intval($operand2);
                   break;

                case 'mul' :
                   $result = intval($operand1) * intval($operand2);
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

