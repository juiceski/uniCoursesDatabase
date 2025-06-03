<?php
  include "connecttodb.php";
  $query = "SELECT DISTINCT uniID FROM outsidecourses";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
     echo '<option value="'.$row["uniID"].'">'.$row["uniID"].' </option>';
    
   }
   mysqli_free_result($result);
?>