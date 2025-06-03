<?php
  include "connecttodb.php";
  
  $province = $_POST['pickapro'];

  $query = 'SELECT * FROM universities WHERE provinceCode LIKE "'.$province.'"';

  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }

  echo "<table>";

  echo "<tr><td> Official Name </td><td> Nickname </td></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr><td>".$row['officialName']. "</td><td>" .$row['nickName']. "</td><tr>";
  }
  
  echo "</table>";

  mysqli_free_result($result);
  $connection->close();
?>