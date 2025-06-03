<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Equivalency Delete Prompt</title>
</head>
<body>
<?php
  include "connecttodb.php";
?>
<p><a href="home.html" style="text-decoration:none">Home</a></p>

<div class="container">
    <div class="radio">
        <form action="" method="post">
            <p>Found equivalencies for selected course, are you sure you want to delete?</p>
            <input type="submit" value="OK" name="eprompt">
            <input type="submit" value="Cancel" name="eprompt">
        </form>
    </div>
</div>

<?php
    $num = $_GET['num'];
    if (isset($_POST['eprompt'])) { // either deletes the western course with equivalencies or cancels the deletion
        if($_POST['eprompt'] == "OK"){
            include "connecttodb.php";
            $delete = 'DELETE FROM westerncourses WHERE courseNum LIKE "'.$num.'"';
            mysqli_query($connection, $delete);
            echo '<script>alert("Course deleted successfully.")</script>';
            $connection->close();
            echo "<script> location.href='/vm134/a3robert/index.php'; </script>";
        }
        else{
            echo '<script>alert("Course deletion cancelled by user.")</script>';
            $connection->close();
            echo "<script> location.href='/vm134/a3robert/index.php'; </script>";
        }
    } //end of if
?>

</body>
</html>
