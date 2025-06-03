<?php
  include "connecttodb.php";

  $num = $_POST['pickacode2'];
  $code = $_POST['pickaout'];
  $id = $_POST['pickaouni'];
  $date = date('Y-m-d');
  
  $query = 'SELECT * FROM equivalent WHERE westernCourse LIKE "'.$num.'" AND outsideCourse LIKE "'.$code.'" AND university LIKE "'.$id.'"';
  $add = 'INSERT INTO equivalent (westernCourse, outsideCourse, university, dateDecided) VALUES ("'.$num.'","'.$code.'","'.$id.'","'.$date.'")';
  $update = 'UPDATE equivalent SET dateDecided="'.$date.'" WHERE westernCourse LIKE "'.$num.'" AND outsideCourse LIKE "'.$code.'" AND university LIKE "'.$id.'"';

  $checkOutside = 'SELECT * FROM outsidecourses WHERE courseCode LIKE "'.$code.'" AND uniID LIKE "'.$id.'"';
  

  
  $chkO = mysqli_query($connection, $checkOutside); // checks if the outside course is offered by the outside university
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("databases query failed.");
  }
  else {
    if($row = mysqli_fetch_assoc($result)){ // if equivalency already exists, update it
        mysqli_query($connection, $update);
        print("Existing equivalency updated.");
    }
    else{
        if ($row = mysqli_fetch_assoc($chkO)){ // if outside course offered, equivalency will be added
            mysqli_query($connection, $add);
            print("Equivalency addition successful.");
        }
        else{ // else outside course doesn't exist, do not add equivalency
            print("Equivalency addition failed, invalid Outside Course and University ID combination, please check to see if the Outside course selected is offered by the Outside University selected.");
        }
        
    }
    
  }
  mysqli_free_result($result);
  $connection->close();

  
?>