<?php
  header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title></title>
    <script>
        function fn()
        {
            var a,b;
            a=document.addForm.operand1.value;
            b=document.addForm.operand2.value;
alert (a);
alert(b);
//document.addForm.operand1.value= ' a ';
//document.addForm.operand2.value= 'b';
//var url="http://localhost/PHP/rest-api-php/Addhtml.php?operand1=1%20&%20operand2=2";
            var url="http://localhost/PHP/rest-api-php/Addhtml.php?operand1= " + a + "&operand2= " + b ;
            document.addForm.action=url;
            document.addForm.submit();

        }
        </script>
</head>
<body>
    <form name='addForm'>
        enter the first operand
        <input type='number' name='operand1' size='20' />
        enter the second operand
        <input type='number' name='operand2' size='20'/>
        <br>
        <br>
        <input type='submit' value='submit' onclick=fn() />

    </form>
</body>
</html>

<?php
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