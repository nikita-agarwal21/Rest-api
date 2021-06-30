<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
        $n = false;
        if ( isset($_GET['n']))
            $n = $_GET['n'];

        if ( !$n )
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "No parameter ..."
             ));
             return;
        }

	$m = (int)$n;
   
        if ( $m >= 0 && $m <= 9 )
        {
	     switch ($m) 
             {
                case 0 :
                   $result = 'Zero';
                   break;

                case 1 :
                   $result = 'One';
                   break;

                case 2 :
                   $result = 'Two';
                   break;

                case 3 :
                   $result = 'Three';
                   break;

                case 4 :
                   $result = 'Four';
                   break;

                case 5 :
                   $result = 'Five';
                   break;

                case 6 :
                   $result = 'Six';
                   break;

                case 7 :
                   $result = 'Seven';
                   break;

                case 8 :
                   $result = 'Eight';
                   break;

                case 9 :
                   $result = 'Nine';
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

