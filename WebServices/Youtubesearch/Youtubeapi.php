<?php
     require_once "YoutubeHelper.php";

     $youtubeHelper = new YoutubeHelper();


?>

<html>
   <head>

   </head>

   <body>
      <br>
      <form name="searchForm" method="POST" action="YoutubeController.php">
          enter youtube search:
          <input type="text" name="name" size="5" value="<?php echo $youtubeHelper->getname(); ?>" />
          <br>
          <br>

          <input type="submit" value="Submit" />
          <br>
          <br>
      <!-- <iframe width="560" height="315" src="//<//?php echo $answer ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
-->

      </form>
   </body>
</html>
