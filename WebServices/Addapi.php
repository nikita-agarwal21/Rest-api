<?php
     require_once "AddHelper.php";

     $addHelper = new AddHelper();

     $answer = "";
     if ( isset($_POST['answer'] ))
         $answer = $_POST['answer'];
?>

<html>
   <head>

   </head>

   <body>
      <br>
      <form name="addForm" method="POST" action= "AddController.php">
          Operand 1 
          <input type="text" name="operand1" size="5" value="<?php echo $addHelper->getOperand1(); ?>" />
          <br>
          <br>
          Operand 2
          <input type="text" name="operand2" size="5" value="<?php echo $addHelper->getOperand2(); ?>" />
          <br>
          <br>
          <input type="submit" value="Submit" />
          <br>
          <br>
          <?php echo $answer; ?>
      </form>
   </body>
</html>
