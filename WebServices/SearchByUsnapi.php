<?php
     require_once "SearchByUsnHelper.php";

     $searchbyusnHelper = new SearchbyUsnHelper();

     $answer = "";
     if ( isset($_POST['answer'] ))
         $answer = $_POST['answer'];
?>

<html>
   <head>

   </head>

   <body>
      <br>
      <form name="searchForm" method="POST" action= "SearchByUsnController.php">
          enter usn:
          <input type="text" name="usn" size="5" value="<?php echo $searchbyusnHelper->getusn(); ?>" />
          <br>
          <br>
         
          <input type="submit" value="Submit" />
          <br>
          <br>
          <?php echo $answer; ?>
      </form>
   </body>
</html>
