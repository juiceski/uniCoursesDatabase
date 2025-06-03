<?php
  include "connecttodb.php";
  $query = "SELECT * FROM westerncourses";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
     echo '<option value="'.$row["courseNum"].'">'.$row["courseName"].' </option>';
    
   }
   mysqli_free_result($result);
?>