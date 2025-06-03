<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>University Information Database</title>
</head>
<body>

<p><a href="home.html" style="text-decoration:none">Home</a></p>

<h1>University Information Database</h1>

<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="radio">
      <!--Form to display University Information by name-->
        <form action="" method="post">

            <p>Display University Information And Courses Offered</p>
            <select name="pickauni" id="pickauni">
            <option value="1">Select University</option>
            <?php
                include "connecttodb.php";
                include "unidropdown.php"; // dropdown of university names
            ?>
            </select>

            <input type="submit" value="Submit" name="unisubmit">

        </form>

        <p></p>
        <!--Form to display University Information by province-->
        <form action="" method="post">

            <p>Display University Information From Selected Province</p>
            <select name="pickapro" id="pickapro">
            <option value="1">Select Province</option>
            <?php
                include "connecttodb.php";
                include "prodropdown.php"; // dropdown of province codes
            ?>
            </select>

            <input type="submit" value="Submit" name="prosubmit">

        </form>

      </div>
    </div>

    <!--List names and nicknames of universities in system w/ no courses-->
    <div class="col-sm">
      <div class="radio">

        <p>Universities With No Associated Courses</p> 
        <?php
          include "connecttodb.php";
          include "nocourselist.php"; // list of universities with no course
        ?>
  
      </div>
    </div>
  </div>
</div>

<!--University data tables for by name and by province-->
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm"> 
      
    <?php
        if (isset($_POST['unisubmit'])) { // display table of university info and courses offered on submit
            if($_POST['pickauni'] != 1){
                include "connecttodb.php";
                include "getunidata.php"; // table of university info and courses offered
            }
            else{
                print("Please select a university.");
            }
        } //end of if
    ?>

    <?php
        if (isset($_POST['prosubmit'])) { // display table of province university information on submit
            if($_POST['pickapro'] != 1){
                include "connecttodb.php";
                include "getprovincedata.php"; // table of universities by province
            }
            else{
                print("Please select a province.");
            }
        } //end of if
    ?>

    </div>
  </div>
</div>
</hr>

</body>
</html>