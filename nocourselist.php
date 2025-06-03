<?php
    include "connecttodb.php";

    $query = 'SELECT * FROM universities LEFT JOIN outsidecourses ON universityID=uniID WHERE courseName is NULL';

    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    echo '<ul>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>".$row['officialName']. ", " .$row['nickName']."</li>";
    }
    echo '</ul>';
    mysqli_free_result($result);
    $connection->close();
?>