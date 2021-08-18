<?php
    $opr1 = $_POST['operand1'];
    $opr2 = $_POST['operand2'];

    $url = "http://www.codersclub.in/webservices/Add.php?operand1=".$opr1."&operand2=".$opr2;

    $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    $obj = json_decode($result);
    $answer = $obj->result;

    $_POST['answer'] = $answer;
    
    include_once "Addapi.php";
?>



