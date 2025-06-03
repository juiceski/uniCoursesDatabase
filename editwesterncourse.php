<?php
  include "connecttodb.php";

  $num = $_POST['pickacourse'];
  $name = $_POST['ecoursename'];
  $weight = $_POST['eweight'];
  $suffix = $_POST['esuffix'];

  
  if($name != ""){ // update name
    $query = 'UPDATE westerncourses SET courseName="'.$name.'" WHERE courseNum LIKE "'.$num.'"';
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("databases query failed.");
    }
  }


  if($weight != ""){ // update weight
    $query = 'UPDATE westerncourses SET weight="'.$weight.'" WHERE courseNum LIKE "'.$num.'"';
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("databases query failed.");
    }
  }

  
  if($suffix != ""){ // update suffix
    $query = 'UPDATE westerncourses SET suffix="'.$suffix.'" WHERE courseNum LIKE "'.$num.'"';
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("databases query failed.");
    }
  }

  $connection->close();
  

  
?>