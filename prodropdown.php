<?php
  include "connecttodb.php";
  $query = "SELECT DISTINCT provinceCode FROM universities ORDER BY provinceCode ASC";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
     echo '<option value="'.$row["provinceCode"].'">'.$row["provinceCode"].' </option>';
   }
   mysqli_free_result($result);
?>