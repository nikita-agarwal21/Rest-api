<!DOCTYPE html>

<?php
    require_once 'StudentsByGenderHelper.php';
    $studentGenderHelper = new StudentsByGenderHelper();

    $students = false;
    if (isset( $_POST['students']))
        $students = $_POST['students'];
	
?>

<html>
  <head>
      <link rel="stylesheet" type="text/css" href="/cc/css/style.css" />
  </head>

  <body >
    <br>
    <br>
    <form name="genderForm" method="post" action="StudentsByGenderController.php" >
       Gender : 
       <input type="radio" name="gender" value="M" required <?php echo $studentGenderHelper->isGenderChecked("M"); ?>>Male
       <input type="radio" name="gender" value="F" required <?php echo $studentGenderHelper->isGenderChecked("F"); ?>>Female
       <br>
       <br>
       <input type="submit" value="Submit" />
       <br>
       <br>
       <?php 
            if ( $students )
            { ?>
                <table border='1'>
                    <tr>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>City</th>

                    </tr>
                    <?php foreach ( $students as $student ) {
                     ?>
                    <tr>
                        <td><?php echo $student->getUsn() ?></td>
                        <td><?php echo $student->getName() ?></td>
                        <td><?php echo $student->getGender() ?></td>
                        <td><?php echo $student->getPhoneNumber() ?></td>
                        <td><?php echo $student->getEmail() ?></td>
                        <td><?php echo $student->getCity() ?></td>

                    </tr>


            <?php }}
            ?>
       </form>
  </body>

</html>
