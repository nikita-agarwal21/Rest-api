<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
    {
        $day = false;
        $month = false;
        if ( isset($_GET['day']))
            $day = $_GET['day'];
        if ( isset($_GET['month']))
            $month = $_GET['month'];

        if ( !$day || !$month )
        {
             http_response_code(404);
             echo json_encode(array(
                  "status" => 0,
                  "message" => "No parameter ..."
             ));
             return;
        }

	$m = (int)$month;
    $d=(int)$day;
   
   if($m=='12')
    {
         if($d<'22')
          $result='sagittarius';
         else {
              $result='capricorn';
         }
    }
    else if($m =='1')
    {
         if($d<'20')
          $result='capricorn';
         else  {
             $result='aquarius';
         }
    }
    else if($m =='2')
    {
         if($d<'19')
          $result='aquarius';
         else  {
             $result='pisces';
         }
    }
    else if($m =='3')
    {
         if($d<'21')
          $result='pisces';
         else  {
             $result='aries';
         }
    }
    else if($m =='4')
    {
         if($d<'20')
           $result='aries';
         else  {
           $result='taurus';
              }
    }
    else if($m =='5')
    {
         if($d<'21')
           $result='taurus';
         else  {
           $result='gemini';
              }
    }
    else if($m =='6')
    {
         if($d<'21')
           $result='gemeni';
         else  {
           $result='cancer';
              }
    }
    else if($m =='7')
    {
         if($d<'23')
           $result='cancer';
         else  {
           $result='leo';
              }
    }
    else if($m =='8')
    {
         if($d<'23')
           $result='leo';
         else  {
           $result='virgo';
              }
    }
    else if($m =='9')
    {
         if($d<'23')
           $result='virgo';
         else  {
           $result='libra';
              }
    }
    else if($m =='10')
    {
         if($d<'23')
           $result='libra';
         else  {
           $result='scorpio';
              }
    }
    else if($m =='11')
    {
         if($d<'22')
           $result='scorpio';
         else  {
           $result='sagittarius';
              }
    }	

	     http_response_code(200);
             echo json_encode(array(
                   "status" => 1,
                   "message" => $result
             ));
             return;  
               
        if(!$result)
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

