<?php
  include "connecttodb.php";
  
  $uniID = $_POST['pickauni'];

  $query = 'SELECT * FROM universities INNER JOIN outsidecourses ON universityID=uniID WHERE universityID LIKE "'.$uniID.'"';
  $info = 'SELECT * FROM universities WHERE universityID LIKE "'.$uniID.'"';

  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  $infoResult = mysqli_query($connection,$info);
  if (!$infoResult) {
    die("databases query failed.");
  }

  echo "<table>";
  $inforow = mysqli_fetch_assoc($infoResult);
  echo "<tr><td> University ID </td><td> Official Name </td><td> City Located </td><td> Province Code </td><td> Nickname </td></tr>";
  echo "<tr><td>".$inforow['universityID']. "</td><td>" .$inforow['officialName']. "</td><td>" .$inforow['city']. "</td><td>" .$inforow['provinceCode']. "</td><td>" .$inforow['nickName']. "</td></tr>";
  echo "</table>";

  echo "<p></p>";
  
  echo "<table>";
  echo "<tr><td> Course Code </td><td> Course Name </td><td> Course Year </td><td> Course Weight </td></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr><td>".$row['courseCode']. "</td><td>" .$row['courseName']. "</td><td>" .$row['year']. "</td><td>" .$row['weight']. "</td><tr>";
  }
  echo "</table>";
  mysqli_free_result($result);
  $connection->close();
?>