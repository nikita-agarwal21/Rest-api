<?php

$num=$_POST['number'];

$url="http://www.codersclub.in/webservices/Word.php?n=".$num;

$ch= curl_init();//initilaise curl section
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result= curl_exec($ch);
curl_close($ch);

$obj=json_decode($result);
$answer=$obj->message;

$_POST['answer']=$answer;





include_once "Wordapi.php";






?>