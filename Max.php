<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
      $a=false;
      $b=false;
     
        if ( isset($_GET['a']))
            $a = $_GET['a'] ;

        if ( isset($_GET['b']))
            $b = $_GET['b'] ;

        if ( !$a || !$b)
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "Parameter problem  ..."
             ));
             return;
        }

       if(intval($a) > intval($b))
          $message='a is greater';
       else {
           $message='b is greater';
       }

        http_response_code(200);
        echo json_encode(array(
            "status" => 1,
            "message" => $message
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