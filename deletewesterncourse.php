<?php
  include "connecttodb.php";

  $num = $_POST['pickacourse'];
  
  $query = 'SELECT * FROM equivalent WHERE westernCourse LIKE "'.$num.'"';
  $delete = 'DELETE FROM westerncourses WHERE courseNum LIKE "'.$num.'"';

  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  else {
    if($row = mysqli_fetch_assoc($result)){ // equivalencies found, prompt again for deletion
      header("Location: http://cs3319.gaul.csd.uwo.ca/vm134/a3robert/equivalentprompt.php?num=".$num);
    }
    else{ // no equivalencies, go ahead with deletion
      mysqli_query($connection, $delete);
      print("Course deletion successful.");
    }
  }
  $connection->close();
?>