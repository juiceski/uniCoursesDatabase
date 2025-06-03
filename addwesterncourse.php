<?php
  include "connecttodb.php";

  $num = $_POST['coursenum'];
  $name = $_POST['coursename'];
  $weight = $_POST['weight'];
  $suffix = $_POST['suffix'];

  $query = 'SELECT courseNum FROM westerncourses WHERE courseNum LIKE "'.$num.'"';
  $add = 'INSERT INTO westerncourses (courseNum, courseName, weight, suffix) VALUES ("'.$num.'","'.$name.'","'.$weight.'","'.$suffix.'")';

  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("databases query failed.");
  }
  else {
    if($row = mysqli_fetch_assoc($result)){ // if the course number was found, do not add the course
        echo '<script>alert("Course Number already exists. Course was not added.")</script>';
    }
    else{ // course number not found, add new western course
        mysqli_query($connection, $add);
        print("Course addition successful.");
    }
    
  }
  mysqli_free_result($result);
  $connection->close();
?>