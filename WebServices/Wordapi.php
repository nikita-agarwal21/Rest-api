<?php

require_once 'WordHelper.php';

$wordHelper=new WordHelper();
$answer="";
if(isset($_POST['answer']))
    $answer=$_POST['answer'];


?>
<html>
<title>number to word</title>
<head>
</head>
<body>
<form name='wordForm' method='POST' action='WordController.php'>
enter the number:
<input type ='text'name='number' size='5' value='<?php echo $wordHelper->getNumber();?>'/>
<br>
<br>
<input type='submit' value='submit'/>
<br>
<br>
<?php echo $answer;?>



</form>
</body>
</html>
