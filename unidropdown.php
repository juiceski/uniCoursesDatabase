<?php
  include "connecttodb.php";
  $query = "SELECT * FROM universities ORDER BY provinceCode ASC";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
     echo '<option value="'.$row["universityID"].'">'.$row["officialName"].' </option>';
   }
   mysqli_free_result($result);
?>