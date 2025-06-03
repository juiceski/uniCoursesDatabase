<?php
  include "connecttodb.php";
  
  $date = $_POST['pickdate'];

  $query = 'SELECT * FROM equivalent INNER JOIN (SELECT * FROM outsidecourses INNER JOIN universities ON uniID=universityID) d ON uniID=d.universityID AND outsideCourse=d.courseCode INNER JOIN (SELECT weight AS westWeight, courseName AS westName, courseNum FROM westerncourses) w ON westernCourse=w.courseNum WHERE dateDecided <= "'.$date.'"';
  
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  echo "<table>";
  echo "<tr><td> Course Name </td><td> Course Number </td><td> Course Weight </td><td> Outside University Name </td><td> Outside Course Name </td><td> Outside Course Code </td><td> Outside Course Weight </td><td> Equivalency Date </td><tr>";
  while ($row = mysqli_fetch_assoc($result)) {
     $num = $row['courseNum'];
     echo "<tr> <td>".$row['westName']. "</td><td>" .$row['courseNum']. "</td><td>" .$row['westWeight']. "</td><td>" .$row['officialName']. "</td><td>" .$row['courseName']. "</td><td>" .$row['outsideCourse']. "</td><td>" .$row['weight']. "</td><td>" .$row['dateDecided']. "</td></tr>";

  }
  echo "</table>";
  mysqli_free_result($result);
  $connection->close();
?>