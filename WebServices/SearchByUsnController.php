<?php
    $usn = $_POST['usn'];
   
    $url = "http://www.codersclub.in/webservices/searchByUSN.php?usn=".$usn;

    $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    $obj = json_decode($result);
    $answer = $obj->result;

    $_POST['answer'] = $answer;
    
    include_once "SearchByUsnapi.php";
?>



