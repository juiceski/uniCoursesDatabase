<?php
  include "connecttodb.php";
  
  if( $_POST['1']=='courseNum' && $_POST['2']=='asc' ){
    $query = 'SELECT * FROM westerncourses ORDER BY courseNum ASC';
  }
  if( $_POST['1']=='courseNum' && $_POST['2']=='desc' ){
    $query = 'SELECT * FROM westerncourses ORDER BY courseNum DESC';
  }

  if( $_POST['1']=='courseName' && $_POST['2']=='asc' ){
    $query = 'SELECT * FROM westerncourses ORDER BY courseName ASC';
  }
  if( $_POST['1']=='courseName' && $_POST['2']=='desc' ){
    $query = 'SELECT * FROM westerncourses ORDER BY courseName DESC';
  }
  
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  echo "<table>";
  echo "<tr><td> Course Number </td><td> Course Name </td><td> Course Weight </td><td> Course Suffix </td><tr>";
  while ($row = mysqli_fetch_assoc($result)) {
     $num = $row['courseNum'];
     echo "<tr> <td>".$row['courseNum']. "</td><td>" .$row['courseName']. "</td><td>" .$row['weight']. "</td><td>" .$row['suffix']. "</td></tr>";

  }
  echo "</table>";
  mysqli_free_result($result);
  $connection->close();
?>