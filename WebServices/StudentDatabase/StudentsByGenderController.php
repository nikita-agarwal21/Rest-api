<?php
     require_once 'Student.php';

     $gender = $_POST['gender'];

     // get the data from the web service and store in the variable $result
     $ch = curl_init();
     curl_setopt ($ch, CURLOPT_URL, "www.codersclub.in/webservices/listByGender.php?gender=".$gender);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $result = curl_exec($ch);
     curl_close($ch);

     $someArray = json_decode($result, true);

     $students = array(); 
     foreach($someArray as $row)  {
               $student = new Student(
                            $row["usn"],
                            $row["name"],
                            $row["gender"],
                            $row["phoneNumber"],
                            $row["email"],
			                $row["city"]);
                $students[] = $student;
    }

    $_POST['students'] = $students;
    include 'StudentsByGender.php';
?>
